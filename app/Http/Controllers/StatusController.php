<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $model;
    public function __construct(Status $cliente)
    {
        $this->model = $cliente;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $indicacao = $this->model->create($request->all());
            return response($indicacao->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não localizado');
        }
        return response($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não encontrado!');
        }
        try {
            $dados = $request->all();
            $cliente->fill($dados)->save();
            return response('cliente atualizado');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    //Remova o recurso especificado do armazenamento.

    public function destroy(string $id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('cliente não encontrado!');
        }
        try {
            $cliente->delete();
            return response('Cliente excluido');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
