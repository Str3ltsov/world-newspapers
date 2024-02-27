<?php

use App\Models\Role;
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
        Schema::create('newspapers_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(Role::REGISTERED)->constrained('newspapers_roles');
            $table->string('name', 50);
            $table->string('website', 100)->nullable();
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('username', 60);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->boolean('status')->default(false);
            $table->string('timezone', 40)->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers_users');
    }
};
