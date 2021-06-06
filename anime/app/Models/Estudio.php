<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    protected $fillable=[


        "Nombre","Fundador","Oficina","Website","Foto",

    ];

    public function Estudio()

    {

    return $this->hasMany(Anime::class);

    }   

}    
