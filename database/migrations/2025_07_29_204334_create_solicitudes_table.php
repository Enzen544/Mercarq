<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blueprint_id')->nullable()->constrained('blueprints')->nullOnDelete();
            $table->string('tipo_solicitud');
            $table->string('nombre_solicitante');
            $table->string('email_solicitante')->nullable();
            $table->string('telefono_solicitante')->nullable();
            $table->text('mensaje')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};