<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Retorna uma resposta padronizada para API
 * 
 * @param string $message
 * @param string $code
 * @param integer $statusCode
 * @param array $adicionais
 * @return JsonResponse
 * 
 */
if (!function_exists('resposta_padrao'))
{
    function resposta_padrao(
        string $message,
        string $code,
        int $statusCode,
        array $adicionais = []
    ): JsonResponse
    {
        return response()->json([
            "status" => $statusCode, 
            "code" => $code,
            "message" => $message
        ] + $adicionais, $statusCode);
    }
}

if(!function_exists('resposta_token'))
{
    /**
     * Retorna uma resposta padrão para os tokens de autenticação
     * 
     * @param string $token
     * @return jsonResponse
     */
    function resposta_token(string $token): JsonResponse
    {
        return response()->json([
            'access' => $token,
            'refresh' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
