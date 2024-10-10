<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotDePasseToPeopleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string('mot_de_passe');  // Ajoute le champ mot de passe
            $table->rememberToken();         // Optionnel : ajoute le champ pour le token de session
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('mot_de_passe');  // Supprime le champ mot de passe
        });
    }
}

