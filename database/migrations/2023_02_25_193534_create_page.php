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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("meta_keywords");
            $table->string("meta_description");
            $table->string("page_type");
            $table->tinyInteger("published")->default(0);
            $table->json("gjs_data")->nullable();
            $table->unsignedInteger("created_by")->nullable();
            $table->unsignedInteger("modified_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page');
    }
};
