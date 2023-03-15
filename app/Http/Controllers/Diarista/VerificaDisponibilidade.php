<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Requests\CepRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Actions\Diarista\ObterDiaristasPorCep;

class VerificaDisponibilidade extends Controller
{
    public function __construct(
        private ObterDiaristasPorCep $obterDiaristasPorCep
    ){}

    /**
     * Retorna a disponibilidade de diaristas para um CEP
     *
     * @param CepRequest $request
     * @return JsonResponse
     */
    public function __invoke(CepRequest $request): JsonResponse
    {

        [$diaristasCollection] = $this->obterDiaristasPorCep->executar($request->cep);
        
        return resposta_padrao(
            "Disponibildade verificada com sucesso",
            "success",
            200,
            ["disponibilidade" => $diaristasCollection->isNotEmpty()]
        );
    }
}
