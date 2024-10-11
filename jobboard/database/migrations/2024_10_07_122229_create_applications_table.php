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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')->constrained('advertisements')->onDelete('cascade');
            $table->foreignId('applicant_id')->constrained('people')->onDelete('cascade');
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');
            $table->string('first_name')->after('advertisement_id'); // Ajouter après 'advertisement_id'
            $table->string('last_name')->after('first_name'); // Ajouter après 'first_name'
            $table->string('phone')->after('email'); // Ajout du champ 'phone'
            $table->string('cv')->after('phone'); // Ajout du champ 'cv'
            $table->text('cover_letter')->nullable()->after('cv'); // Ajout du champ 'cover_letter' (facultatif)
       
$table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
