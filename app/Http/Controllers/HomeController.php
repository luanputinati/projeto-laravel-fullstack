<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Human;
use App\Models\Animal;
use Cagartner\CorreiosConsulta\CorreiosConsulta;

class HomeController extends Controller
{

    protected $human;
    protected $animal;

    public function __construct(Human $human, Animal $animal)
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
        $animals = $this->animal->all();
        $humans = $this->human->all();
        return view('dashboard.index', compact('humans', 'animals'));
    }
}
