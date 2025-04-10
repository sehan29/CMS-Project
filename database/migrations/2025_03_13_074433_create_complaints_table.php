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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('category');
            $table->text('details');
            $table->string('division');
            $table->string('priority');
            $table->integer('rating');
            $table->integer('status');
            $table->string('notes');
            $table->timestamps();
        });

         // You may need a table for attachments
         Schema::create('Attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

       
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
