<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Indicacoes;
use Illuminate\Http\Request;
use App\Helpers\ValidadorApi;

class IndicacoesController extends Controller
{
    protected $model;

    public function __construct(Indicacoes $indicacoes)
    {
        $this->model = $indicacoes;
    }

    /**
     * retorna a lista com todos criados
     */
    public function index()
    {
        return response($this->model->all());
    }

    /**
     * cria no banco de dados uma indicacao nova
     */
    public function store(Request $request)
    {
        $validacao = $request->all();
        $lista = $this->model->all();

        $resultado = ValidadorApi::ValidarApi($validacao, $lista);

        if ($resultado !== true) {
            return response($resultado->getContent());
        }

        try {
            $this->model->create($request->all());
            return response('Criado com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * atualiza uma informacao no banco de dados, não foi utilziado, substituido pela função adicionarValor
     */
    /* public function update(Request $request, string $id)
    {
        $cliente = $this->model->find($id);

        if (!$cliente) {
            return response('indicacao não encontrado!');
        }

        try {
            $dados = $request->all();
            $cliente->fill($dados)->save();
            return response('indicacao atualizada');
        } catch (\Throwable $th) {
            throw $th;
        }
    } */

    /**
     * apaga do banco de dados
     */
    public function destroy(string $id)
    {
        $cliente = $this->model->find($id);

        if (!$cliente) {
            return response('indicacao não encontrada!');
        }

        try {
            $cliente->delete();
            return response('indicacao excluída!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * adciona um no valor status_id para conseguir alterar entre Iniciada, Em processo e Finalizada.
     * quando o status for 1 referese a Iniciada
     * quando o status for 2 referese Em processo
     * quando o status for 3 referese Finalizada
     * A Função bloqueia quando tentar deixar o valo com mais do que 3
     */
    public function adicionarValor(int $id)
    {
        try {
            $indicacao = $this->model->find($id);

            if (!$indicacao) {
                return response('Indicação não encontrada!');
            }

            if ($indicacao->status_id >= 3) {
                return response('Indicação não pode mais realizar alterações!');
            }

            $indicacao->status_id += 1;
            $indicacao->save();

            return response('Valor adicionado com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
