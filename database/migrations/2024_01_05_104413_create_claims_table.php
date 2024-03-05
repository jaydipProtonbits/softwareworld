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
        Schema::create('claims', function (Blueprint $table) {
          $table->id();
          $table->integer('type_id');
          $table->integer('claimed_id')->comment('Service & Software Listing');
          $table->integer('approved_by')->nullable();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email');
          $table->timestamp('email_verified_at')->nullable();
          $table->timestamp('approved_at')->nullable();
          $table->string('status')->nullable();
          $table->timestamps();
          $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
