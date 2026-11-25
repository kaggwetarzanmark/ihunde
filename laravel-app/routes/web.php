<?php

use App\Http\Controllers\FormStatusController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/design-system', 'design-system')->name('design-system');
Route::view('/cookies', 'cookies')->name('cookies');
Route::view('/accommodation', 'pages.accommodation')->name('pages.accommodation');
Route::view('/single-room', 'pages.accommodation-room', [
    'room' => config('ihunde.rooms.0'),
])->name('pages.single-room');
Route::view('/double-room', 'pages.accommodation-room', [
    'room' => config('ihunde.rooms.1'),
])->name('pages.double-room');
Route::view('/rates-and-availability', 'pages.rates-and-availability')
    ->name('pages.rates-and-availability');

$emptyPageSlugs = [
    'dining',
    'restaurant',
    'bar-and-lounge',
    'room-service',
    'menus',
    'events',
    'weddings',
    'conferences-and-retreats',
    'party-gardens',
    'camp-fire-evenings',
    'wellness',
    'offers',
    'about',
    'contact',
    'gallery',
];

foreach ($emptyPageSlugs as $slug) {
    Route::view("/{$slug}", 'pages.empty')->name("pages.{$slug}");
}

Route::post('/booking/availability', [FormStatusController::class, 'availability'])
    ->name('booking.availability');
Route::post('/newsletter', [FormStatusController::class, 'subscribe'])
    ->name('newsletter.subscribe');
