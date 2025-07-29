<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    
    protected $table = 'solicitudes'; 

    protected $fillable = [
        'blueprint_id',
        'tipo_solicitud',
        'nombre_solicitante',
        'email_solicitante',
        'telefono_solicitante',
        'mensaje',
        'ip_address',
    ];

    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class);
      
    }
}