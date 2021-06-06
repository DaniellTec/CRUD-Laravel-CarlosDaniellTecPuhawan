<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable=[


        "Nombre","Genero","Episodios","Temporadas","EstudioAnimacion","Valoración","Foto",

    ];

    public function Anime() 

    {

        return $this->belongsTo('App\Models\Estudio');

    }

}
