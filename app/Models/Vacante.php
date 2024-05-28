<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = ['ultimo_dia'=>'date'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion_puesto',
        'imagen',
        'user_id'
    ];

    /**
     * The client to which this Salartio belongs.
     */
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    /**
     * The client to which this TicketSubject belongs.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }

    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
