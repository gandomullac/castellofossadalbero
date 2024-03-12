<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {

        foreach (static::tables() as $table) {
            Schema::table($table, function (Blueprint $table): void {
                $table->unsignedBigInteger('created_by')
                    ->default(1);
                $table->unsignedBigInteger('last_edit_by')
                    ->default(1)
                    ->nullable();

                $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('last_edit_by')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        foreach (static::tables() as $table) {
            Schema::table($table, function (Blueprint $table): void {
                $table->dropForeign(['last_edit_by']);
                $table->dropColumn(['created_by', 'last_edit_by']);
            });
        }
    }

    protected static function tables(): array
    {
        return ['reviews', 'menu_items', 'menu_categories', 'settings', 'attachments'];
    }
};
