<?php

namespace App\Helpers;

/* use App\Helpers\ValidarCPF; */

class ValidadorApi
{
  public static function ValidarApi(array $validacao, $lista)
  {

    //verifica se está recebendo os valores
    if (!isset($validacao['cpf']) || !isset($validacao['email'])) {
      return response("Para realizar o cadastro, é necessário preencher o CPF e o e-mail! Por favor, faça o cadastro.");
    }

    //valida email
    if (!filter_var($validacao['email'], FILTER_VALIDATE_EMAIL)) {
      return response('O e-mail digitado não é válido, por favor digite outro.');
    }
    //valida o cpf
    $validacaoCPF = ValidarCPF::validarCPF($validacao['cpf']);

    if ($validacaoCPF !== true) {
      return response($validacaoCPF->getContent());
    }

    //verifica se já existe no banco de dados esse cpf
    foreach ($lista as $item) {
      if ($item['cpf'] === $validacao['cpf']) {
        return response('cpf já cadastro, por favor digite outro.');
      }
    }

    return true;
  }
}
