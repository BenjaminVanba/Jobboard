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
            $table->string('name')->after('status'); // Ajout du champ 'name'
            $table->string('email')->after('name'); // Ajout du champ 'email'
            $table->string('phone')->after('email'); // Ajout du champ 'phone'
            $table->string('cv')->after('phone'); // Ajout du champ 'cv'
            $table->text('cover_letter')->nullable()->after('cv'); // Ajout du champ 'cover_letter' (facultatif)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'cv', 'cover_letter']);
        });
    }
};
