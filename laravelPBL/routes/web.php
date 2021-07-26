<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\partiController;
use App\Http\Controllers\teacherController;

//参加者情報入力画面
Route::get('/A007', [partiController::class, 'A007']);
Route::get('/A008', [partiController::class, 'A008']);
Route::get('/A009', [partiController::class, 'A009']);
Route::get('/A010', [partiController::class, 'A010']);
Route::get('/A011', [partiController::class, 'A011']);
Route::get('/A012', [partiController::class, 'A012']);
Route::post('/A012_1', [partiController::class, 'A012_1']);
Route::get('/A013', [partiController::class, 'A013']);
Route::post('/A013_1', [partiController::class, 'A013_1']);
Route::get('/A014', [partiController::class, 'A014']);

//先生側PC画面
Route::get('/A001', [teacherController::class, 'A001']);
Route::get('/A002', [teacherController::class, 'A002']);
Route::get('/A003', [teacherController::class, 'A003']);
Route::post('/A003', [teacherController::class, 'A003_post']);
Route::post('/A003/add', [teacherController::class, 'A003_add_post']);
Route::get('/A004', [teacherController::class, 'A004']);
Route::get('/A005', [teacherController::class, 'A005']);
Route::post('/A005', [teacherController::class, 'A005_post']);
Route::get('/A006', [teacherController::class, 'A006']);
Route::post('/A006', [teacherController::class, 'A006_post']);