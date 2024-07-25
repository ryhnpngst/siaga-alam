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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'reports_author_id',
            )->onDelete('cascade')->onUpdate('cascade');
            $table->string('category');
            $table->string('description');
            $table->string('location');
            $table->enum('status', [
                'accepted',
                'in verification',
                'valid',
                'invalid',
                'in progress',
                'finished',
            ])->default('accepted');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
