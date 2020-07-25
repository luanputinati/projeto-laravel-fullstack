<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Human;
use App\Models\Animal;
use App\Http\Requests\HumanRequest;
use Cagartner\CorreiosConsulta\CorreiosConsulta;

class HumanController extends Controller
{
    protected $human;

    public function __construct(Human $human)
    {
        $this->human = $human;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('human.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HumanRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(HumanRequest $request)
    {
        $human = new Human();
        $human->fill($request->all());
        $human->save();
        
        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $human = $this->human->findOrFail($id);
        return view ('human.edit', compact('human'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\HumanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HumanRequest $request, $id)
    {
       $human = $this->human->findOrFail($id);
       $human->fill($request->all());
       $human->save();

       return redirect()->action('HomeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $human = $this->human->findOrFail($id);
        $human->delete();

        return redirect()->action('HomeController@index');
    }
}
