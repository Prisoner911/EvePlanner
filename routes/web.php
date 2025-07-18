<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EveController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EveController::class, 'home'])->name('home');
Route::get('/PrivateEvent', [EveController::class, 'privateEvent']);
Route::get('/WeddingEvent', [EveController::class, 'weddingEvent']);
Route::get('/CorporateEvent', [EveController::class, 'corporateEvent']);

Route::get('/bookingpage', [EveController::class, 'bookEvent']);
Route::post('/bookingpage', [CustomerController::class, 'generateOTP']);
Route::post('/bookingpage/otpPage', [CustomerController::class, 'store']);
Route::get('/bookingpage/otpPage', [CustomerController::class, 'otpPage'])->name('bookingOTP');

Route::get('/AboutUs', [EveController::class, 'aboutUS']);

// Mnager page code starts here

Route::get('/managerAccess', [AgentsController::class, 'managerPage'])->name('managerPage')->middleware('guard');
Route::get('/managerAccess/showManager', [AgentsController::class, 'showManager'])->name('managerSearch')->middleware('guard');
Route::get('/customerDetails', [AgentsController::class, 'customerDetails'])->middleware('customer.check');
Route::get('/managerAccess/showCustomer', [AgentsController::class, 'showCustomer'])->name('customerSearch')->middleware('customer.check');
Route::post('/showCustomer/{id}', [AgentsController::class, 'MarkStatus'])->name('MarkStatus')->middleware('customer.check');



Route::get('/customerDetails/{id}', [AgentsController::class, 'viewMore'])->name('ViewMore')->middleware('customer.check');
Route::post('/customerDetails/update', [AgentsController::class, 'update'])->middleware('customer.check');

Route::get('/managerAccess/Agents', [AgentsController::class, 'showAgent'])->name('agentSearch')->middleware('guard');
Route::post('/managerAccess/Agents/{id}', [AgentsController::class, 'AgentStatus'])->name('AgentStatus')->middleware('guard');
Route::get('/managerAccess/addAccess', [AgentsController::class, 'addAgent'])->name('addAgent')->middleware('guard');

Route::post('/managerAccess/addAccess', [AgentsController::class, 'storeAgent'])->name('storeAgent')->middleware('guard');


Route::get('/managerAccess/update/{id}', [AgentsController::class, 'changeData'])->name('agent.edit')->middleware('guard');
Route::post('/managerAccess/update/{id}', [AgentsController::class, 'editData'])->name('agent.update')->middleware('guard');
Route::get('/managerAccess/deleteAgent/{id}', [AgentsController::class, 'deleteAgent'])->name('agent.delete')->middleware('guard');
Route::get('/managerAccess/Agents/viewAssignedEvents/{id}', [AgentsController::class, 'viewEventsAssigned'])->name('viewEventsAssigned')->middleware('guard');


Route::get('/managerAccess/manager/update/{id}', [AgentsController::class, 'changeManagerData'])->name('manager.edit')->middleware('guard');
Route::post('/managerAccess/manager/update/{id}', [AgentsController::class, 'editManagerData'])->name('manager.update')->middleware('guard');
Route::get('/managerAccess/manager/deleteAgent/{id}', [AgentsController::class, 'deleteManager'])->name('manager.delete')->middleware('guard');
Route::get('/managerAccess/addManager', [AgentsController::class, 'addManager'])->name('addManager')->middleware('guard');
Route::post('/managerAccess/addManager', [AgentsController::class, 'storeManager'])->name('storeManager')->middleware('guard');





// Agent page code starts here

Route::get('/agentAccess', [AgentsController::class, 'agentPage'])->name('agentPage')->middleware('agent.guard');
Route::get('/agentAccess/showCustomer', [AgentsController::class, 'showCustomerAgents'])->middleware('agent.guard');

Route::get('/ratinglink/{id}', [RatingController::class, 'ratinglink'])->name('ratinglink')->middleware('customer.check');
Route::get('/rateUs', [RatingController::class, 'ratingPage'])->name('ratingPage');
Route::post('/rateUs', [RatingController::class, 'ratingInput'])->name('ratingInput');




// LOGIN ROUTES AND FORGOT PASSWORD ROUTES

Route::get('/forgetPassword', [LoginController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forgetPassword', [LoginController::class, 'resetPassword']);
Route::get('/newPassword', [LoginController::class, 'newPassword'])->name('newPassword');
Route::post('/newPassword', [LoginController::class, 'setNewPassword']);
Route::get('/forgetPassword/otpPage', [LoginController::class, 'showOTP'])->name('passwordOTP');
Route::post('/forgetPassword/otpPage', [LoginController::class, 'SubmitOTP'])->name('SubpasswordOTP');

// Route::get('/manager', [LoginController::class, 'LoginPage']);
// Route::post('/manager', [LoginController::class, 'Log']);


// Route::get('/agent', [LoginController::class, 'LoginPage']);
// Route::post('/agent', [LoginController::class, 'Log']);


Route::get('/Login', [LoginController::class, 'LoginPage'])->name('Login');
Route::post('/Login', [LoginController::class, 'Log'])->name('Log');
Route::match(['get', 'post'], '/Logout', [LoginController::class, 'Logout'])->name('Logout');

Route::get('/Login/otpPage', [LoginController::class, 'showOTP'])->name('loginOTP');
Route::post('/Login/otpPage', [LoginController::class, 'LogOTP'])->name('logOTP');



Route::get('/managerAccess/showCustomer/assignAgent/{id}', [AgentsController::class, 'assignAgent'])->name('assignAgent')->middleware('guard');
Route::post('/managerAccess/showCustomer/assignAgent/{id}/{agentid}', [AgentsController::class, 'setAgent'])->name('setAgent')->middleware('guard');


Route::get('/managerAccess/showCustomer/assignAgent/{id}/viewAssignedEvents/{agentid}', [AgentsController::class, 'viewAssignedEvents'])->name('viewAssignedEvents')->middleware('guard');
