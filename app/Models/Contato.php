<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable=['nome','apelido','user_id'];


   


public function telefones(){

    return $this->hasMany(Telefone::class);
}

public function consulta()
{
    //$query = ('select * from contato');

    return null;
}
  

}
