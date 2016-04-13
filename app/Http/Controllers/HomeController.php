<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Faq;
use Excel;
use App\Property;
use App\Resident;
use App\User;
use App\Note;
use App\File;
use Auth;

class HomeController extends Controller
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
        if(Auth::user()->hasRole('admin')) {
            return redirect('/admin');
        }
        $properties = Property::with('residents')
        ->orderBy('name', 'asc')
        ->get();
        $html = '';
        foreach ($properties as $property) {
            $adopted = Resident::where('property_id', '=', $property->id)
            ->where('enrolled', '!=', '')
            ->get();

            $html .= '<tr><td>'.$property->name.'</td>';
            if (count($property->residents) !== 0) {
                $html .= '<td>'.number_format(count($adopted)/count($property->residents)*100, 2).'%</td>';
            } else {
                $html .= '<td>No Residents Added</td>';
            }
            $html .= '<td>'.$property->start_date.'-'.$property->end_date.'</td>';
        }

        return view('home')->with('properties', $properties)->with('html', $html);
    }

    public function propertyDashboard()
    {
        $user = Auth::user();
        $adopted = Resident::where('property_id', '=', $user->property_id)
        ->where('enrolled', '!=', '')
        ->get();
        $property = Property::withTrashed()->where('id', '=', $user->property_id)->first();

        return view('property')->with('property', $property)->with('adopted', $adopted);
    }

    public function faqs()
    {

       $faq = Faq::orderBy('property_id', 'asc')              
                ->get();
        return view('faqs')->with('faq', $faq);
    }
	public function showFaq($property_id)
    {

       $faq = Faq::where('property_id', $property_id)
				->orderBy('property_id', 'asc')              
                ->get();
        return view('propertyfaq')->with('faq', $faq);
    }

    public function notes(Request $request)
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

    public function postNotes(Request $request)
    {   
        $user = Auth::user();        

        $note = new Note;
        $note->resident_id = $request->input('resident_id');
        $note->note = $request->input('notes');
        $note->user_id = $user->id;
        $note->save();

        return redirect('/property');
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

    public function deleteResident($resident_id)
    {
        $resident = Resident::find($resident_id);
        $resident->delete();

        return redirect()->back();
    }

    public function contacts()
    {
        return view('contact');
    }

    public function upload()
    {
        return view('upload');
    }

    public function uploadStore(Request $request)
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
        $document->property_id = $user->property->id;
        $document->description = $request->input('description');
        $document->file = $filename;
        $document->save();

        $status = 'File Saved!';
        return redirect('/upload')->with([
            'status' => $status
        ]);
    }

    public function files()
    {
        $user = Auth::User();

        $files = File::where('property_id', '=', $user->property->id)->get();

        return view('files', compact('files'));
    }
}
