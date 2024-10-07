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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nom de l'entreprise
            $table->text('address')->nullable();  // Adresse (facultatif)
            $table->string('email')->nullable();  // Email (facultatif)
            $table->string('phone', 20)->nullable();  // Numéro de téléphone (facultatif)
            $table->string('website')->nullable();  // Site web de l'entreprise (facultatif)
            $table->timestamps();  // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
