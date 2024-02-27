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
        Schema::create('newspapers_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->text('body')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('post_code', 100)->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email', 100)->nullable();
            $table->boolean('message_status')->default(true);
            $table->boolean('message_archive')->default(true);
            $table->integer('message_count')->default(0);
            $table->boolean('message_spam_protection')->default(false);
            $table->boolean('message_captcha')->default(false);
            $table->boolean('message_notify')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_contacts');
    }
};
