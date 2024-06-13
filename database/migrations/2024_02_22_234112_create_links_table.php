<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('newspapers_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('newspapers_links');
            $table->foreignId('menu_id')->constrained('newspapers_menus');
            $table->foreignId('web_data_id')
                ->nullable()
                ->constrained('newspapers_web_data')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('class')->nullable();
            $table->text('description')->nullable();
            $table->string('link');
            $table->text('body')->nullable();
            $table->string('target')->nullable();
            $table->string('rel')->nullable();
            $table->smallInteger('status')->nullable();
            $table->integer('left')->nullable();
            $table->integer('right')->nullable();
            $table->text('visibility_roles')->nullable();
            $table->text('params')->nullable();
            $table->dateTime('publish_start')->nullable();
            $table->dateTime('publish_end')->nullable();
            $table->timestamps();
        });

        // Вставка данных
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_links');
    }
}
