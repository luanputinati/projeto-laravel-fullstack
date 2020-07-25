<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'age', 'human_id'];

    public function human(){
       return $this->belongsTo('App\Models\Human', 'human_id', 'id');
    }
}
