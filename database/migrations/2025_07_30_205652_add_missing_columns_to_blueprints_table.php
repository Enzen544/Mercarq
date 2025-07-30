<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blueprints', function (Blueprint $table) {
            if (!Schema::hasColumn('blueprints', 'whatsapp_number')) {
                $table->string('whatsapp_number', 20)->after('price'); 
            }

            if (!Schema::hasColumn('blueprints', 'file_size')) {
                $table->bigInteger('file_size')->nullable()->after('whatsapp_number'); 
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blueprints', function (Blueprint $table) {
            if (Schema::hasColumn('blueprints', 'file_size')) {
                $table->dropColumn('file_size');
            }

            if (Schema::hasColumn('blueprints', 'whatsapp_number')) {
                $table->dropColumn('whatsapp_number');
            }
        });
    }
};