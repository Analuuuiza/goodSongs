<?php

use App\Http\Controllers\MusicaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Música
Route::post('musica/cadastroMusica',
[MusicaController::class, 'cadastroMusica']);

Route::delete('musica/excluirMusica',
[MusicaController::class, 'excluirMusica']);

Route::put('musica/editarMusica',
[MusicaController::class, 'editarMusica']);

Route::get('musica/find/{id}',
[MusicaController::class, 'pesquisarPorId']);

Route::post('musica/pesquisarPorTitulo',
[MusicaController::class, 'pesquisarPorTitulo']);

Route::post('musica/pesquisarPorArtista',
[MusicaController::class, 'pesquisarPorArtista']);