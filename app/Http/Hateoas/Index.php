<?php

namespace App\Http\Hateoas;

use Illuminate\Database\Eloquent\Model;

class Index extends HateoasBase implements HateoasInterface
{
    

    /**
     * Retorna os links do hateoas para a rota inicial
     * 
     *@return array
     */
    public function links(?Model $_ = null): array
    {
        $this->adicionaLink("GET", "diaristas_cidade", 'diaristas.busca_por_cep');
        $this->adicionaLink("GET", "verificar_disponibilidade_atendimento", 'endereco.disponibilidade');
        $this->adicionaLink("GET", "endereco_cep", 'enderecos.cep');
        $this->adicionaLink("GET", "listar_servicos", 'servicos.index');

        $this->adicionaLink("POST", "cadastrar_usuario", "usuarios.create");
        $this->adicionaLink("POST", "login", "autenticacao.login");
        $this->adicionaLink("GET", "usuario_logado", "usuarios.show");

        return $this->links;
    }

}