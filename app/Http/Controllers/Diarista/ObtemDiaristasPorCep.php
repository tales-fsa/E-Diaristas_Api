<?php

namespace App\Http\Controllers\Diarista;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CepRequest;
use App\Http\Controllers\Controller;
use App\Actions\Diarista\ObterDiaristasPorCep;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Services\ConsultaCEP\ConsultaCEPInterface;

class ObtemDiaristasPorCep extends Controller
{
    public function __construct(
        private ObterDiaristasPorCep $obterDiaristasPorCep
    ){}
    /**
     * Busca diaristas pelo CEP
     * 
     *@param CepRequest $request
     *@param ConsultaCEPInterface $servicoCEP 
     *@return DiaristaPublicoCollection|JsonResponse 
     */
    public function __invoke(CepRequest $request): DiaristaPublicoCollection|JsonResponse
    {
        [$diaristasCollection, $quantidadeDiaristas] = $this->obterDiaristasPorCep->executar($request->cep);

        return new DiaristaPublicoCollection(
            $diaristasCollection,
            $quantidadeDiaristas
        );
    }
}
