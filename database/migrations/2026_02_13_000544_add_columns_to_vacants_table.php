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
        Schema::table('vacants', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            $table->string('enterprise');
            $table->date('last_day');
            $table->longText('description');

            $table->string('image')->nullable();

            $table->boolean('published')->default(1);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacants', function (Blueprint $table) {

            // Eliminar FKs primero
            $table->dropForeign(['salary_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);

            $table->dropColumn([
                'title',
                'salary_id',
                'category_id',
                'enterprise',
                'last_day',
                'description',
                'image',
                'published',
                'user_id'
            ]);
        });
    }
};
