<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function movimentacao()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
