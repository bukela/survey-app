<?php

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
   Route::get('/', function() {
       switch (auth()->user()->role->code) {
           case 'manager':
               return redirect()->route('manager.home');
               break;
           case 'doctor':
               return redirect()->route('doctor.home');
               break;
           default:
               return redirect()->route('admin.home');
               break;
       }
   })->name('home');
});

// Super Admin Routes
Route::middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin.home');

        Route::get('/managers/crerate', 'ManagerController@create')->name('admin.manager.create');
        Route::post('/manager', 'ManagerController@store')->name('admin.manager.store');
        Route::get('/managers', 'DashboardController@index')->name('admin.manager.index');
        Route::get('/managers/{manager}', 'ManagerController@show')->name('admin.manager.show');
        Route::get('/managers/{manager}/desc', 'ManagerController@show_desc')->name('admin.manager.show_desc');
        Route::delete('/managers/{manager}', 'ManagerController@destroy')->name('admin.manager.delete');

        Route::get('/doctor/{doctor}', 'DoctorController@show')->name('admin.doctor.show');
        Route::delete('/doctor/{doctor}', 'DoctorController@destroy')->name('admin.doctor.delete');
    });

// Manager Routes
Route::middleware(['auth', 'manager'])
    ->namespace('Manager')
    ->prefix('manager')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('manager.home');
        Route::get('/desc', 'DashboardController@index_desc');

        Route::get('/doctor/{doctor}', 'DoctorController@show')->name('manager.doctor.show');
        Route::delete('/doctor/{doctor}', 'DoctorController@destroy')->name('manager.doctor.delete');
    });

// Doctor Routes
Route::middleware(['auth', 'doctor'])
    ->namespace('Doctor')
    ->prefix('doctor')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('doctor.home');

        Route::get('/patients/create', 'PatientController@create')->name('doctor.patient.create');
        Route::post('/patients', 'PatientController@store')->name('doctor.patient.store');
        Route::delete('/patients/{id}', 'PatientController@destroy')->name('doctor.patient.delete');

        Route::get('/surveys/{doctor}/{patient}/{survey}', 'SurveyController@create')->name('doctor.survey.create');
        Route::post('/surveys', 'SurveyController@store')->name('doctor.survey.store');
});

Route::get('/doctor/final-survey/{doctor}', 'Doctor\SurveyController@createFinalSurvey')->name('doctor.survey.create.final');
Route::post('/doctor/final-survey', 'Doctor\SurveyController@storeFinalSurvey')->name('doctor.survey.store.final');

Route::get('/export/csv/{survey_id?}/{role?}/{id?}', 'ExportController@csv')->name('export.csv');


Route::get('/ddd', function() {
    $no_export = App\SurveyDoctorPatient::where('survey_id', 2)->where('created_at','<','2018-11-15')->pluck('patient_id')->toArray();
    dd($no_export);
});

Auth::routes();

////// COMMENT OUT BEFORE COMMIT //////

//// Manualy send reminder to doctor for last survey
//Route::get('/rmndrtst/{id}', function($id) {
//    $doctor = \App\User::find($id);
//
//    if ($doctor->role->code == 'doctor') {
//        $url = route('doctor.survey.create.final', ['doctor' => $doctor]);
//
//        try {
//            \Illuminate\Support\Facades\Mail::to($doctor->email)
////            \Illuminate\Support\Facades\Mail::to(['aleksandar.petresevic@extraordinary.rs', 'b.meskers@tog.amsterdam', 'miroslav.rankovic@extraordinary.rs'])
//                ->send(new \App\Mail\SurveyReminder($doctor, $url));
//
//            Log::info('Notification for last survey sent to: ' . $doctor->email);
//
//            dd('Success!');
//        } catch (ConnectException $e) {
//            Log::error('Notification for last survey NOT sent to (will retry): ' . $doctor->email . ' - ' . $e->getMessage());
//
//            dd($e->getMessage());
//        }
//    }
//
//    dd('Not doctor. Check user ID');
//});

// Force login for testing
//Route::get('/bckdr/{id}', function ($id) {
//   $u = \App\User::find($id);
//   Auth::login($u);
//
//   return redirect()->route('home');
//});
