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
        Schema::create('newspapers_countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('newspapers_countries');
            $table->foreignId('web_data_id')
                ->nullable()
                ->constrained('newspapers_web_data')
                ->onDelete('cascade');
            $table->string('code', 5)->nullable();
            $table->string('title', 100);
            $table->string('link');
            $table->text('body')->nullable();
            $table->string('flag')->nullable();
            $table->string('flag_alt')->nullable();
            $table->text('flag_info')->nullable();
            $table->integer('left')->nullable();
            $table->integer('right')->nullable();
            $table->boolean('active')->unsigned()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_countries');
    }
};
