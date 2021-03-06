<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BTSController;
// use App\Http\Controllers\BTSPhotoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyorController;

// use App\Models\admin;
// use App\Models\answer;
// use App\Models\answer_option;
// use App\Models\bts_photo;
// use App\Models\bts;
// use App\Models\configuration;
// use App\Models\edit_answer;
// use App\Models\edit_bts;
// use App\Models\edit_survey;
// use App\Models\jenis_bts;
// use App\Models\kecamatan;
// use App\Models\monitoring;
// use App\Models\owner;
// use App\Models\question;
// use App\Models\riwayat_survey;
// use App\Models\survey;
// use App\Models\surveyor;
// use App\Models\user_log;
// use App\Models\User;
// use App\Models\village;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/btslist', function () {
//     return view('btslist');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/btsmonitor', function () {
//     return view('btsmonitor');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/surveyor', function () {
//     return view('dashboard.surveyor.index');
// })->middleware('auth');




// Route::get('/admin', [AdminController::class, 'index']);

// Route::get('/admin', function(){
//     return view('dashboard.admin.index');
// })->middleware('auth');

// Route::get('/admin/edit-profile', function(){
//     return view('dashboard.admin.profile.edit');
// })->middleware('auth');

// Route::get('/admin/edit-config', function () {
//     return view('dashboard.admin.config.index');
// })->middleware('auth');

// Route::get('/admin/edit-surveyor', function () {
//     return view('dashboard.admin.surveyor.index');
// })->middleware('auth');

// Route::get('/admin/edit-bts', function () {
//     return view('dashboard.admin.bts.index');
// })->middleware('auth');

// Route::get('/admin/edit-pemilik', function () {
//     return view('dashboard.admin.pemilik.index');
// })->middleware('auth');

// Route::get('/admin/edit-wilayah', function () {
//     return view('dashboard.admin.wilayah.index');
// })->middleware('auth');

// Route::get('/admin/list-survey', function () {
//     return view('dashboard.admin.survey.index');
// })->middleware('auth');


//

// sementara admin (create, edit, show):

// BTS
// Route::get('/admin/edit-bts/create', function () {
//     return view('dashboard.admin.bts.create');
// })->middleware('auth');

// Route::get('/admin/edit-bts/edit', function () {
//     return view('dashboard.admin.bts.edit');
// })->middleware('auth');

// Route::get('/admin/edit-bts/show', function () {
//     return view('dashboard.admin.bts.show');
// })->middleware('auth');


//



// Route::get('/admin/edit-config', function () {
//     return view('editConfig');
// });


// Route::get('/admin/edit-profile', function () {
//     return view('dashboard.admin.editProfileAdmin');
// });

// Route::get('/surveyor/edit-profile', function () {
//     return view('dashboard.surveyor.editProfileSurveyor');
// })->middleware('auth');

// Route::get('/surveyor/edit-jawaban-survey', function () {
//     return view('dashboard.surveyor.editJawabanSurvey');
// })->middleware('auth');

// Route::get('/surveyor/isi-survey', function () {
//     return view('dashboard.surveyor.isiSurvey');
// })->middleware('auth');

// Route::get('/surveyor/info-bts', function () {
//     return view('dashboard.surveyor.listBTSInfo');
// })->middleware('auth');

// Route::get('/admin/pesan', function () {
//     return view('dashboard.admin.messageList');
// })->middleware('auth');

// Route::get('/surveyor/monitoring', function () {
//     return view('dashboard.surveyor.monitoringSurveyor.index');
// })->middleware('auth');

// Route::get('/admin/buat-survey', function () {
//     return view('dashboard.admin.newSurvey');
// })->middleware('auth');

// Route::get('dashboard.surveyor/survey', function () {
//     return view('dashboard.surveyor.surveyList');
// })->middleware('auth');

// Route::get('/thanks', function () {
//     return view('thanks');
// });

// Route::get('/login', function () {
//     return view('login');
// });


// Route::get('/', function () {
//     return view('index');
// });


// batas suci

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

// Route::redirect('/', destination:'login'); //auto redirect into login url

// Route::post('/logout', [LoginController::class, 'logout']);

// Route::resource('/dashboard', DashboardController::class)->middleware('auth');

// batas suci

// Route::get('/surveyor', [SurveyorController::class, 'index']);
// Route::get('/surveyor', function(){
//     return view('dashboard.surveyor.index');
// })->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::redirect('/', destination:'login'); //auto redirect into login url

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/edit-bts', BTSController::class)->middleware('auth');

// Route::post('store', 'BTSController@store')->name('store.uploadBTSPhotos')->middleware('auth');

// Route::put('/dashboard/edit-bts/{id}/edit','BTSController@update')->name('bts.update');

Route::resource('/dashboard/edit-owner', OwnerController::class)->middleware('auth');
