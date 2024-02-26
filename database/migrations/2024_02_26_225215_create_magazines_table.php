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
        Schema::create('newspapers_magazines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained('newspapers_links');
            $table->string('title');
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->string('cover')->nullable();
            $table->string('cover_alt')->nullable();
            $table->boolean('active')->unsigned()->default(true);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_magazines');
    }
};
