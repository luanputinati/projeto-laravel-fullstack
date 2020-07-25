<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Human;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{
    protected $animal;
    protected $human;

    public function __construct(Animal $animal, Human $human)
    {
        $this->animal = $animal;
        $this->human = $human;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humans = $this->human->all();
        return view('animal.create', compact('humans'));
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
     * @param  \App\Http\Requests\AnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $animal = new Animal();
        $animal->fill($request->all());
        $animal->save();

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
        $humans = $this->human->all();
        $animal = $this->animal->findOrFail($id);

        return view('animal.edit', compact('humans', 'animal'));
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
        $animal = $this->animal->findOrFail($id);
        $animal->fill($request->all());
        $animal->save();

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
        $animal = $this->animal->findOrFail($id);
        $animal->delete();

        return redirect()->action('HomeController@index');
    }
}
