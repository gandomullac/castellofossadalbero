<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->boolean('protected')
                ->default(false);

            $table->unsignedBigInteger('created_by')
                ->default(1);
            $table->unsignedBigInteger('last_edit_by')
                ->default(1)
                ->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('last_edit_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['last_edit_by']);
            $table->dropColumn(['created_by', 'last_edit_by']);
            $table->dropColumn('protected');
        });
    }
};
