<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Faq;
use App\User;
use App\Resident;
use App\Note;
use App\Role;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Excel;
use Auth;
use URL;
use Mail;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::with('residents')
        ->orderBy('name', 'asc')
        ->get();
        $html = '';
        foreach ($properties as $property) {
            $adopted = Resident::where('property_id', '=', $property->id)
            ->where('enrolled', '!=', '')
            ->get();			
            $html .= '<tr><td><a href="'.URL::to('/property').'/'.$property->id.'">'.$property->name.'</a></td>';
            if (count($property->residents) !== 0) {
                $html .= '<td>'.number_format(count($adopted)/count($property->residents)*100, 2).'%</td>';
            } else {
                $html .= '<td>No Residents Added</td>';
            }
            $html .= '<td>'.$property->start_date.'-'.$property->end_date.'</td>';
            $html .= '<td class="text-center">
            <div class="btn-group">
            <a class="confirm btn btn-xs btn-danger" data-toggle="tooltip" title="" data-original-title="Delete Property" href="'.URL::to('/delete').'/'.$property->id.'"><i class="fa fa-times"></i></a>
            </div>
					  </td></tr>';
        }

        return view('admin')->with('properties', $properties)->with('html', $html);
    }

    public function showImport()
    {
        $properties = Property::all();
        return view('import')->with('properties', $properties);
    }

    public function import(Request $request)
    {
        if ($request->hasFile('csv')) {
            $property = $request->input('property');
            $file = $request->file('csv');
            $filename = Carbon::now()->format('Y-m-d').$file->getClientOriginalName();
            $destinationPath = storage_path('/app');
            $file->move($destinationPath, $filename);

            Excel::load('storage/app/'.$filename, function($reader) use($property) {

                $objects = $reader->toObject();
				
                foreach ($objects as $object) {
                    if ($object['property'] !== null) {

                        if(Resident::where('tenant_id', '=', $object['tenant'])->exists()) {
                            $resident = Resident::where('tenant_id', '=', $object['tenant'])->first();
                        } else {
                            $resident = new Resident;
                        }
                        $resident->property_id = $property;
                        $resident->property = $object['property'];
                        $resident->tenant_id = $object['tenant'];
                        $resident->unit = $object['unit'];
                        $resident->name = $object['first_last'];
                        $resident->phone_1 = $object['phone_1'];
                        $resident->phone_2 = $object['phone_2'];
                        $resident->email = $object['email'];
                        $resident->status = $object['status'];
                        
                       // echo '<pre>';print_r($resident);
                        $resident->save();
                    }
                    
                }
				exit;
            });

            return redirect('/admin');

        } else {
            return redirect()->back()->with('status', 'No File Selected');
        }   
    }
    public function propertyAdd()
    {
        return view('property_add');
    }

    public function propertyAddPost(Request $request)
    {
        $this->validate($request, [
            'property_name' => 'required|max:255',
            'ennrollment_status' => 'required',            
        ]); 
        $enrolled = implode(",",$request->input('ennrollment_status'));
        //$enrolled = str_replace("Blank"," ",$enrolled);
        $property = New Property;
        $property->name = $request->property_name;
        $property->enrollment_status = $enrolled;
        $property->save();

        session(['property' => $property]);

        return redirect('/onboarding-user-add');
    }

    public function userAdd()
    {
        $properties = Property::all();
        return view('auth.register')->with('properties', $properties);
    }

    public function userAddPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->property_id = $request->input('property');
        $user->save();

        return redirect('/admin');
    }

    public function onboardingUserAdd(Request $request)
    {
        if ($request->session()->has('property')) {
            $property = session('property');
            return view('onboarding_user')->with('property', $property);
        } else {
            return redirect('/property_add');
        }
        
    }

    public function onboardingUserAddPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->property_id = $request->input('property');
        $user->save();

        return redirect('/onboarding-import');
    }

    public function seeProperty($property_id)
    {
        $user = Auth::user();
        $adopted = Resident::where('property_id', '=', $property_id)
        ->where('enrolled', '!=', '')
        ->get();
        $property = Property::with('residents')->where('id', '=', $property_id)->first();
        
        return view('admin_property')->with('property', $property)->with('adopted', $adopted);
    }

    public function onboardingShowImport(Request $request)
    {
        if ($request->session()->has('property')) {
            $property = session('property');
            return view('onboarding_import')->with('property', $property);
        } else {
            return redirect('/property_add');
        }
    }

    public function onboardingImport(Request $request)
    {
        if ($request->hasFile('csv')) {
            $property = $request->input('property');
            $file = $request->file('csv');
            $filename = Carbon::now()->format('Y-m-d').$file->getClientOriginalName();
            $destinationPath = storage_path('/app');
            $file->move($destinationPath, $filename);

            Excel::load('storage/app/'.$filename, function($reader) use($property) {

                $objects = $reader->toObject();

                foreach ($objects as $object) {
                    if ($object['property'] !== null) {

                        if(Resident::where('tenant_id', '=', $object['tenant'])->exists()) {
                            $resident = Resident::where('tenant_id', '=', $object['tenant'])->first();
                        } else {
                            $resident = new Resident;
                        }
                        $resident->property_id = $property;
                        $resident->property = $object['property'];
                        $resident->tenant_id = $object['tenant'];
                        $resident->unit = $object['unit'];
                        $resident->name = $object['first_last'];
                        $resident->phone_1 = $object['phone_1'];
                        $resident->phone_2 = $object['phone_2'];
                        $resident->email = $object['email'];
                        $resident->status = $object['status'];
                        $resident->save();
                    }
                    
                }

            });
           

            return redirect('/admin');
        } else {
            return redirect()->back()->with('status', 'No File Selected');
        }
    }

    public function notes(Request $request, $property_id)
    {           
        $id = $request->input('id');
        $notes = Note::where('resident_id', '=', $id)
        ->orderBy('updated_at', 'asc')
        ->get();		
        $html = '';
        foreach ($notes as $note) {
            $html .= '<div><p>'.$note->updated_at->format('m-d-Y').' Added By: '.$note->user->name.'</p><p>'.$note->note.'</p></div>';
        }
        $html .= '<div><input type="hidden" name="_token" value="'.csrf_token().'""><input type="hidden" name="resident_id" value="'.$id.'""><label>Add New Note</label><textarea name="notes" style="resize:none;width:100%;height:150px;" required></textarea>';

        return $html;
    }

    public function postNotes(Request $request, $property_id)
    {  
        $user = Auth::user();   
		$property = Property::where('id', '=', $property_id)->get();
		$resident = Resident::where('id', '=', $request->input('resident_id'))->get();
		
        $note = new Note;
        $note->resident_id = $request->input('resident_id');
        $note->note = $request->input('notes');
        $note->user_id = $user->id;
        $note->save();
        
        $data = array(
        'name' => $user->name,
        'email' => $user->email,
        'property_name' => $property[0]->name,
        'resident_name' => $resident[0]->name
		);
       	
		Mail::send('emails.notes', $data, function ($message) use ($data) {
			$message->to(env('ADMIN_EMAIL'))->subject('Notes added by '.$data['name']);
		});
		/**$to = "ashish.kumar@srmtechsol.com";
		$subject = "Notes added by ".$data['name'];
		$msg = "A note added by ".$data['name']." for resident ".$data['resident_name']." in property ".$data['resident_name']."<br/><br/>
		
		Regards <br/>
		Support
		 ";		
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Ditaro.com <adminp@ditaro.com>' . "\r\n";
		@mail($to,$subject,$msg,$headers);**/
        return redirect()->route('adminproperty', [$property_id]);
    }
   
    public function deleteProperty($property_id)
    {
        $property = Property::find($property_id);
        $property->delete();

        return redirect('/admin');
    }

    public function adminUserAdd()
    {
        return view('admin_user');
    }

    public function adminUserAddPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $admin = Role::where('name', '=', 'admin')->first();
        $user->roles()->attach($admin);

        return redirect('/admin');
    }

    public function enrollChange(Request $request) {
        $resident = Resident::find($request->input('id'));
        $resident->enrolled = $request->input('name');
        $resident->save();
        return 'Enroll Status Changed!';
    }

    public function chargeAdded(Request $request) {
        $resident = Resident::find($request->input('id'));
        $resident->charge = $request->input('name');
        $resident->save();
        return 'Charge Status Changed!';
    }

    public function chargeAmount(Request $request) {
        $resident = Resident::find($request->input('id'));
        $resident->charge_amount = $request->input('cost');
        $resident->save();
        return 'Charge Amount Changed!';
    }

    public function workDates(Request $request) {
        $property = Property::find($request->input('id'));
        if ($request->input('name') == 'start') {
            $property->start_date = $request->input('date');
        }
        if ($request->input('name') == 'end') {
            $property->end_date = $request->input('date');
        }
        $property->save();
        return 'Date Saved!';
    }

    public function adminUpload($property_id=false)
    {        
        $properties = Property::all();		
        return view('admin_upload')->with('properties', $properties)->with('property_id',$property_id);
    }

    public function adminUploadStore(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
            'file' => 'required|max:20000',
        ]);

        $user = Auth::User();
        $file = $request->file('file');
        $extension = $file->getClientOriginalName();
        $time = Carbon::now()->format('Y.m.d.h.i.s');
        $filename = $time.'-'.$extension;
        $file->move( storage_path().'/files/', $filename );
        $document = new File;
        $document->user_id = $user->id;
        $document->property_id = $request->input('property');
        $document->description = $request->input('description');
        $document->file = $filename;
        $document->save();

        $status = 'File Saved!';
        return redirect('/admin-upload')->with([
            'status' => $status
        ]);
    }
     public function faqProperty($property_id=false)
    {
        $properties = Property::all();

        return view('faq_property')->with('properties', $properties)->with('property_id',$property_id);
    }
     public function faqPropertyStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:faq|max:255',
            'description' => 'required',
        ]);
        
        $faq = new Faq;
        $faq->property_id = $request->input('property');
        $faq->title = $request->input('title');
        $faq->description = $request->input('description');        
        $faq->save();        
        
		$status = 'Faq Saved successfully!';
				
       return redirect('/faq-property')->with([
            'status' => $status
        ]);
    }
     public function faqUpdate($faq_id)
    {
        $faq = Faq::where('id', '=', $faq_id)->get();
		$properties = Property::all();
        return view('faq_property_edit')->with('faq', $faq)->with('properties', $properties);
    }
    public function faqUpdateAction(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);        
        Faq::where('id', $request->input('faq_id'))
          ->update(['title' => $request->input('title'),'description' => $request->input('description')]); 
          
		$status = 'Faq updates successfully!';
				
       return redirect('/faq-update/'.$request->input('faq_id'))->with([
            'status' => $status
        ]);
    }
}
