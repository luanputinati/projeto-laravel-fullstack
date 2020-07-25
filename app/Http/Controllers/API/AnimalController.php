<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Human;
use App\Models\Animal;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{

    protected $modelanimal;
    
    public function __construct(Animal $animal)
    {
        $this->modelanimal = $animal;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = $this->modelanimal->all();
        return response()->json($animals, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        try{
            $animals = new Animal();
            $animals->fill($request->all());
            $animals->save();

            return response()->json($animals, 201);
        } catch(\Exception $e){
            return response()->json([
            'title' => 'Erro',
            'msg' => 'Erro interno de servidor'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $animals = $this->modelanimal->findOrFail($id);
            return response()->json($animals);

        } catch(\Exception $e){
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, $id)
    {
        try{
            $animals = $this->modelanimal->findOrFail($id);
            $animals->fill($request->all());
            $animals->save();

            return response()->json($animals, 200);

        } catch(\Exception $e){
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $animal = $this->modelanimal->findOrFail($id);
            $animal->delete();

            return response()->json([
                'title' => 'Delete',
                'msg' => 'Animal deletado com sucesso'], 200);

        } catch(\Exception $e){
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'], 500);
        }
    }
}
