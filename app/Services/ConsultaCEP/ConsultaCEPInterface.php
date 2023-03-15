<?php 

namespace App\Services\ConsultaCEP;

/**
 * Define o padrão para busca do endereço a partir do cep
 * 
 * @param string $cep
 * @return false|EnderecoResponse
 */
interface ConsultaCEPInterface
{
    public function buscar(string $cep): false|EnderecoResponse;
}