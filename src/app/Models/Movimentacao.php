<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $fillable = ["tipo_movimentacao", "valor", "observacao", "funcionario_id", "administrador_id"];

    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


}
