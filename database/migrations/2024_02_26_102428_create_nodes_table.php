<?php

use App\Models\Type;
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
        Schema::create('newspapers_nodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('newspapers_nodes');
            $table->foreignId('user_id')->default(0)->constrained('newspapers_users');
            $table->foreignId('type_id')->default(Type::NODE)->constrained('newspapers_types');
            $table->string('title');
            $table->string('slug');
            $table->text('body')->nullable();
            $table->text('excerpt')->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->smallInteger('comment_status')->default(1);
            $table->integer('comment_count')->nullable()->default(0);
            $table->boolean('promote')->default(false);
            $table->string('path');
            $table->text('terms')->nullable();
            $table->boolean('sticky')->default(false);
            $table->integer('left')->nullable();
            $table->integer('right')->nullable();
            $table->text('visibility_roles')->nullable();
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
        Schema::dropIfExists('newspapers_nodes');
    }
};
