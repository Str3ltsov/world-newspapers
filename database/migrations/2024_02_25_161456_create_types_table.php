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
        Schema::create('newspapers_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->text('description')->nullable();
            $table->boolean('format_show_author')->default(true);
            $table->boolean('format_show_date')->default(true);
            $table->boolean('format_use_wysiwyg')->default(true);
            $table->smallInteger('comment_status')->default(1);
            $table->boolean('comment_approve')->default(true);
            $table->boolean('comment_spam_protection')->default(false);
            $table->boolean('comment_captcha')->default(false);
            $table->text('params')->nullable();
            $table->string('plugin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_types');
    }
};
