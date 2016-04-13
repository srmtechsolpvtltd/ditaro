<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');
    Route::get('/contacts', 'HomeController@contacts');
    Route::get('/property', 'HomeController@propertyDashboard');
    Route::post('/property', 'HomeController@postNotes');
    Route::get('/charge-added', 'AdminController@chargeAdded');
    Route::get('/charge-amount', 'AdminController@chargeAmount');
    Route::get('/enrollment-change', 'AdminController@enrollChange');
    Route::get('/notes', 'HomeController@notes');
    Route::get('/faqs', 'HomeController@faqs');
    Route::get('/show-faq/{property_id}', 'HomeController@showFaq');
    Route::get('/delete/resident/{resident_id}', 'HomeController@deleteResident');
    Route::get('/upload', 'HomeController@upload');
    Route::post('/upload', 'HomeController@uploadStore');
    Route::get('/files', 'HomeController@files');
    Route::get('/document/{filename}', function($filename) {
        return response()->download(storage_path().'/files/'.$filename);
    });
    Route::get('/file/{id}/delete', function($id) {
        $file = App\File::find($id);

        $file->delete();

        return redirect()->back();
    });
    // Registration Routes...

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');
});

Route::group(['middleware' => ['web', 'role:admin']], function () {
    Route::get('/work-dates', 'AdminController@workDates');
	Route::post('/import', 'AdminController@import');
    Route::get('/admin', 'AdminController@index');
    Route::get('/property-add', 'AdminController@propertyAdd');
    Route::post('/property-add', 'AdminController@propertyAddPost');
    Route::get('/user-add', 'AdminController@userAdd');
    Route::post('/user-add', 'AdminController@userAddPost');
    Route::get('/admin-user-add', 'AdminController@adminUserAdd');
    Route::post('/admin-user-add', 'AdminController@adminUserAddPost');
    Route::get('/import', 'AdminController@showImport');
    Route::get('/onboarding-import', 'AdminController@onboardingShowImport');
    Route::post('/onboarding-import', 'AdminController@onboardingImport');
    Route::get('/onboarding-user-add', 'AdminController@onboardingUserAdd');
    Route::post('/onboarding-user-add', 'AdminController@onboardingUserAddPost');
    // $this->get('register', 'Auth\AuthController@showRegistrationForm');
    // $this->post('register', 'Auth\AuthController@register');
    Route::get('property/{property_id}', 'AdminController@seeProperty')->name('adminproperty');
    Route::post('/adoption-change/{property_id}', 'AdminController@adoptionChange');
    Route::get('/notes/{property_id}', 'AdminController@notes');
    Route::get('/delete/{property_id}', 'AdminController@deleteProperty');
    Route::post('/property/{property_id}', 'AdminController@postNotes');
    Route::get('/admin-upload/{property_id}', 'AdminController@adminUpload');
    Route::get('/admin-upload', 'AdminController@adminUpload');
    Route::post('/admin-upload', 'AdminController@adminUploadStore');
    Route::get('/admin-uploads', function() {

        $files = App\File::with('property')
        ->orderBy('property_id')
        ->get();

        return view('files', compact('files'));
    });
    Route::get('/faq-property', 'AdminController@faqProperty');
    Route::get('/faq-property/{property_id}', 'AdminController@faqProperty');
    Route::post('/faq-property', 'AdminController@faqPropertyStore');
    Route::get('/faq-update/{faq_id}', 'AdminController@faqUpdate');
    Route::post('/faq-property-update', 'AdminController@faqUpdateAction');
    Route::get('users/loginas/{id}', function($id) {
        Auth::loginUsingId($id); 

        return Redirect('/');
    });
});
/*
Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('ashish.kumar@srmtechsol.com', 'Learning Laravel');

        $message->to('ashishaietmca@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});
*/
