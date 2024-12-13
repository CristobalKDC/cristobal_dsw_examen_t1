<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});

Route::get('/messages', [MessageController::class, 'index'])->name('messages');


// Ruta para vista crear mensajes
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
// Almacenar el mensaje
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Ruta para mostrar el formulario de edición de un mensaje específico
Route::get('/messages/modificar/{id}', [MessageController::class, 'edit'])->name('messages.edit');

Route::get('/messages/listaEliminar', [MessageController::class, 'lista'])->name('messages.lista');

// Ruta para actualizar el mensaje en la base de datos
Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');

// Ruta para eliminar un mensaje específico
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
