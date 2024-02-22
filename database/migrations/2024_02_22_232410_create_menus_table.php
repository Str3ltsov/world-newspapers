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
        Schema::create('newspapers_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->string('class')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
            $table->smallInteger('weight')->nullable();
            $table->integer('link_count')->default(0);
            $table->text('params')->nullable();
            $table->dateTime('publish_start')->nullable();
            $table->dateTime('publish_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_menus');
    }
};
