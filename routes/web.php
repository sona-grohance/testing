<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;





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


Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'doLogin']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'doRegister']);

Route::middleware('auth')->group(function () {
    
    Route::get('/mountair', [LoginController::class, 'viewLogin']);
    Route::get('/logout', [LoginController::class, 'logout']);
    
    Route::get('/add-testimonial', [TestimonialController::class, 'viewTestimonialForm']);
    Route::post('/add-testimonial', [TestimonialController::class, 'addTestimonial']);
    Route::get('/testimonials', [TestimonialController::class, 'viewTestimonialTable']);
    Route::get('/delete-testimonial/{id}', [TestimonialController::class, 'deleteTestimonial']);
    Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'updateTestimonial']);
    Route::post('/edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial']);

    Route::get('/locations', [LocationController::class, 'viewLocationTable']);
    Route::get('/add-location', [LocationController::class, 'viewLocationForm']);
    Route::post('/add-location', [LocationController::class, 'addLocation']);
    Route::get('/delete-location/{id}', [LocationController::class, 'deleteLocation']);
    Route::get('/edit-location/{id}', [LocationController::class, 'updateLocation']);
    Route::post('/edit-location/{id}', [LocationController::class, 'editLocation']);

    Route::get('/properties', [PropertyController::class, 'viewPropertyTable']);
    Route::get('/add-property', [PropertyController::class, 'viewPropertyForm']);
    Route::post('/add-property', [PropertyController::class, 'addProperty']);
    Route::get('/delete-property/{id}', [PropertyController::class, 'deleteProperty']);
    Route::get('/edit-property/{id}', [PropertyController::class, 'updateProperty']);
    Route::post('/edit-property/{id}', [PropertyController::class, 'editProperty']);
    Route::get('/details-property/{id}', [PropertyController::class, 'detailsProperty']);
    Route::get('/images-property/{id}', [PropertyController::class, 'viewPropertyImages']);

    Route::get('/delete-propertyimage/{id}', [PropertyController::class, 'deletePropertyImage']);
    Route::get('/edit-propertyimage/{id}', [PropertyController::class, 'updatePropertyImage']);
    Route::post('/edit-propertyimage/{id}', [PropertyController::class, 'editPropertyImage']);
    Route::get('/add-propertyimage/{id}', [PropertyController::class, 'propertyImageForm']);
    Route::post('/add-propertyimage/{id}', [PropertyController::class, 'addPropertyImage']);


});