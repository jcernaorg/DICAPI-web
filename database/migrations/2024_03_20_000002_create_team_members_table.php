<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('position');
            $table->text('description');
            $table->string('avatar')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('team_type')->default('other');
            $table->integer('projects')->default(0);
            $table->integer('students')->default(0);
            $table->integer('users')->default(0);
            $table->integer('programs')->default(0);
            $table->integer('teachers')->default(0);
            $table->integer('studies')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
}; 