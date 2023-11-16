<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('UTBM')->create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('chemin'); 
            $table->string('nom_utilisateur');
            $table->boolean('prive')->default(false); // 'false' signifie public par défaut
            $table->string('Univ')->default('UTBM'); 
            $table->timestamps(); // Inclut 'created' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
