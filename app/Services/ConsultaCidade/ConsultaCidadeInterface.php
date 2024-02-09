<?php

namespace App\Services\ConsultaCidade;

interface ConsultaCidadeInterface
{
    /**
     * Busca um código do IBGE na Api
     *
     * @param integer $codigo
     * @return CidadeResponse
     */
    public function codigoIBGE(int $codigo): CidadeResponse;
}
