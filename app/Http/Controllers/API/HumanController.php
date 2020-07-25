<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Human;
use App\Models\Animal;
use App\Http\Requests\HumanRequest;
use Cagartner\CorreiosConsulta\CorreiosConsulta;

class HumanController extends Controller
{


    protected $modelhuman;

    public function __construct(Human $human)
    {
        $this->modelhuman = $human;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humans = $this->modelhuman->all();
        return response()->json($humans, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HumanRequest $request)
    {
        try{
            $address = \Correios::cep($request->zipcode);
            
            if(empty($address)){
                return response()->json([
                'title' => 'Erro',
                'msg' => 'CEP não localizado'], 404);
            } else{
                $human = new Human();
                $human->fill($request->all());
                $human->save();

            return response()->json($human, 201);
            }
            
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
            $human = $this->modelhuman->findOrFail($id);
            return response()->json($human);

        }catch(\Exception $e){
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
    public function update(HumanRequest $request, $id)
    {
        try{
            $human = $this->modelhuman->findOrFail($id);
            $human->fill($request->all());
            $human->save();

            return response()->json($human, 200);

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
            $human = $this->modelhuman->findOrFail($id);
            $human->delete();

            return response()->json([
                'title' => 'Delete',
                'msg' => 'Human deletado com sucesso'], 200);

        } catch(\Exception $e){
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'], 500);
        }
        
    }
}
