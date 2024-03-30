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
    public function up(): void
    {
        Schema::create('vendeurs', function (Blueprint $table) {
            $table->id();
            $table->string('NomV');
            $table->string('PrénomV');
            $table->string('EmailV')->unique();
            $table->string('mot_de_passV');
            $table->string('mot_de_passV_confirmé')->nullable()->default(NULL);
            $table->string('tele')->default('0'); 
            $table->string('adress')->default('0');
            $table->string('image')->default('0'); 
            $table->unsignedBigInteger('id_cafe')->default(0); 
            $table->unsignedBigInteger('super_admin_id')->nullable(); // Clé étrangère nullable
            $table->timestamps();

            // Contrainte de clé étrangère
            $table->foreign('super_admin_id')->references('id')->on('super_admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendeurs');
    }
};
