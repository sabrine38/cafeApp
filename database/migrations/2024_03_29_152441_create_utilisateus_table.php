<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('motpass');
            $table->string('Confirm_mot_de_pass')->default('0');
            $table->string('type_utilisateur');
            $table->string('telephone')->default('0');
            $table->string('adress')->default('0');
            $table->string('image')->default('0'); 
            $table->unsignedBigInteger('super_admin_id')->nullable(); // Clé étrangère nullable
          
            $table->timestamps();
            $table->foreign('super_admin_id')->references('id')->on('super_admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};