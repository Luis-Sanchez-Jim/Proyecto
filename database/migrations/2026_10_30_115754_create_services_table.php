<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // 1. Llave foránea hacia 'cameras'. 
            // NOTA: Si en tu migración de cámaras pusiste '$table->id()', cámbialo aquí a 'unsignedBigInteger'
            $table->string('camera_serial'); 
            $table->foreign('camera_serial')
                  ->references('serial') // Reemplázalo por 'id' si esa es la columna en tu tabla 'cameras'
                  ->on('cameras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('client_name');
            // 2. Llave foránea hacia el documento único de 'clients'
            $table->string('client_document');
            $table->foreign('client_document')
                  ->references('document')
                  ->on('clients')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
