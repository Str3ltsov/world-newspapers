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
        Schema::create('newspapers_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->nullable()->constrained('newspapers_links');
            $table->foreignId('country_id')->nullable()->constrained('newspapers_countries');
            $table->string('title');
            $table->string('url')->nullable();
            $table->smallInteger('local')->default(1)->nullable();
            $table->string('extra')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_alt')->nullable();
            $table->boolean('active')->unsigned()->default(true);
            $table->smallInteger('check')->unsigned();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_news');
    }
};
