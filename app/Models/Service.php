<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = ['camera_serial', 'client_name', 'client_document'];

    // Relación con Cámara mapeada por serial
    public function camera(): BelongsTo
    {
        // Parámetros: Modelo objetivo, llave foránea en esta tabla, llave en la tabla cámaras
        return $this->belongsTo(Camera::class, 'camera_serial', 'serial');
    }

    // Relación con Cliente mapeada por documento
    public function client(): BelongsTo
    {
        // Parámetros: Modelo objetivo, llave foránea en esta tabla, llave en la tabla clientes
        return $this->belongsTo(Client::class, 'client_document', 'document');
    }
}

