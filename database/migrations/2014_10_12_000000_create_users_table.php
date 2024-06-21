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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('a_paterno',45);
            $table->string('a_materno',45);
            $table->string('nombres',60);
            $table->string('ci',15);
            $table->integer('id_dep');
            $table->string('name',60);
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('id_estus');
            $table->integer('id_tipous')->nullable();
            $table->integer('id_uscrea')->nullable();
            $table->integer('id_usmodif')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
