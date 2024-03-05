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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('tagline')->nullable();
            $table->string('website')->nullable();
            $table->string('vendor_name')->nullable();
            $table->longText('categories')->nullable();
            $table->enum('open_api_support',[0,1])->default(0);
            $table->enum('is_pricing_plan',[0,1])->default(0);
            $table->enum('trail_period',[0,1])->default(0);
            $table->enum('support24_7',[0,1])->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
