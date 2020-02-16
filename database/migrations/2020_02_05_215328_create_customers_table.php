<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo',['PERSONA NATURAL','CONTRIBUYENTE']);
            $table->string('apellido');
            $table->string('name');
            $table->string('name_fiscal')->nullable();
            $table->string('nrf')->nullable();
            $table->string('nip')->nullable();
            $table->string('nit')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('telefono')->nullable();
            $table->enum('gender',['HOMBRE','MUJER', 'OTRO']);
            $table->date('fecha_nac')->nullable();
            $table->timestamps();
            $table->text('obs')->nullable();
            $table->enum('calificacion',['Excelente cliente','Buen cliente', 'Cliente regular', 'Lista Negra']);
            $table->enum('registro',['CLIENTE','FIADOR', 'AMBOS']);
            $table->boolean('prospecto');
            $table->string('image')->nullable();
            $table->boolean('off');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
