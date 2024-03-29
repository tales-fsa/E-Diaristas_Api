<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Diaria\PagaDiaria;
use App\Http\Controllers\Servico\ObtemServicos;
use App\Http\Controllers\Diarista\DefineEndereco;
use App\Http\Controllers\Usuario\CadastroController;
use App\Http\Controllers\Endereco\BuscaCepApiExterna;
use App\Http\Controllers\Diarista\ObtemDiaristasPorCep;
use App\Http\Controllers\Usuario\AutenticacaoController;
use App\Http\Controllers\Diarista\DefineCidadesAtendidas;
use App\Http\Controllers\Diarista\VerificaDisponibilidade;
use App\Http\Controllers\Diaria\CadastroController as DiariaCadastroController;

Route::get('/', IndexController::class);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/me', [AutenticacaoController::class, 'me'])->name('usuarios.show');

    Route::get('/diarias', [DiariaCadastroController::class, 'index'])->name('diarias.index');
    Route::post('/diarias', [DiariaCadastroController::class, 'store'])->name('diarias.store');
    Route::get('/diarias/{diaria}', [DiariaCadastroController::class, 'show'])->name('diarias.show');

    Route::put('/usuarios/endereco', DefineEndereco::class)->name('usuarios.definir-endereco');
    Route::put('/usuarios/cidades-atendidas', DefineCidadesAtendidas::class)->name('usuarios.definir-cidades');

    Route::post('/diarias/{diaria}/pagamentos', PagaDiaria::class)->name('diarias.pagar');
});

Route::get('/diaristas/localidades', ObtemDiaristasPorCep::class)->name('diaristas.busca_por_cep');
Route::get('/diaristas/disponibilidade', VerificaDisponibilidade::class)->name('endereco.disponibilidade');
Route::get('/enderecos', BuscaCepApiExterna::class)->name('enderecos.cep');

Route::get('/servicos', ObtemServicos::class)->name('servicos.index');

Route::post('/usuarios', [CadastroController::class, 'store'])->name('usuarios.create');
