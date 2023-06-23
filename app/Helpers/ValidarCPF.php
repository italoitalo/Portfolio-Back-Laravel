<?php

namespace App\Helpers;

class ValidarCPF
{
    public static function validarCPF($cpf)
    {
        // Remover caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verificar se o CPF possui 11 dígitos
        if (strlen($cpf) != 11) {
            return response('O número do cpf precisa conter 11 dígitos e ser válido');
        }

        // Verificar se todos os dígitos são iguais (ex: 111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return response('O CPF digitado é inválido. Por favor, tente inserir outro CPF.');
        }

        // Validar dígitos verificadores
        for ($i = 9; $i < 11; $i++) {
            $soma = 0;
            for ($j = 0; $j < $i; $j++) {
                $soma += $cpf[$j] * (($i + 1) - $j);
            }
            $resto = $soma % 11;
            $digitoVerificador = ($resto < 2) ? 0 : 11 - $resto;
            if ($cpf[$i] != $digitoVerificador) {
                return response('O CPF digitado é inválido. Por favor, tente inserir outro CPF.');
            }
        }

        // CPF válido
        return true;
    }
}
