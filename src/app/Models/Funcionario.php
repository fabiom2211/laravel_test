<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Funcionario extends Model
{
    protected $fillable = ["nome_completo", "user_id","saldo_atual","administrador_id"];

    const  SALDO_INICIO =0;

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome_completo', 'LIKE', "%{$filter}%");
            }
        })->toSql();
    }

    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }

    public function movimentacao()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
