<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionTransporte;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['cors']], function () {
    Route:: get('/apitest/consultaVehiculos',[GestionTransporte::class,'consultaVehiculos']);
    Route:: get('/apitest/registroPersonas',[GestionTransporte::class,'registroPersonas']);
    Route:: get('/apitest/registroVehiculos',[GestionTransporte::class,'registroVehiculos']);
});

Route:: get('indexx',[GestionTransporte::class,'index']);

Route:: get('registroPersonas',[GestionTransporte::class,'registroPersonas']);
Route:: get('registroVehiculos',[GestionTransporte::class,'registroVehiculos']);

