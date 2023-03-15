<?php

namespace App\Http\Controllers\Servico;

use App\Models\Servico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServicoCollection;

class ObtemServicos extends Controller
{
    /**
     * Retorna a lista de servicos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ServicoCollection
     */
    public function __invoke(): ServicoCollection
    {
        return new ServicoCollection(
            Servico::get()
        );
    }
}
