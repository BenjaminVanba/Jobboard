<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('first_name')->after('advertisement_id'); // Ajouter après 'advertisement_id'
            $table->string('last_name')->after('first_name'); // Ajouter après 'first_name'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name']); // Supprimer les colonnes si la migration est annulée
        });
    }
};
