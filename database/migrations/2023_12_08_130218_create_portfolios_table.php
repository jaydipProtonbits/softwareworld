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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->string('name');
            $table->text('links');
            $table->string('timeline');
            $table->string('project_cost');
            $table->unsignedBigInteger('project_industry');
            $table->string('thumbnail');
            $table->longText('screenshots');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->foreign('project_industry')
                ->references('id')
                ->on('industries')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
