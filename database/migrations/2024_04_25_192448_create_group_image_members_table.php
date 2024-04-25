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
        Schema::create('group_image_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('group_id');
            $table->foreignId('image_id');
            $table->unique(['group_id', 'image_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_image_members');
    }
};
