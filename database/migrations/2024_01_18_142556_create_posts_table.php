<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('content');
            $table->string('image_path');
            $table->unsignedInteger('priority')->default(0);

            $table->date('published_at')->nullable();
            $table->date('unpublished_at')->nullable();

            $table->boolean('archived')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
