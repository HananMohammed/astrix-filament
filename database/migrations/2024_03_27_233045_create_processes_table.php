<?php

use App\Models\User;
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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('project_type')->default(1)->comment('1->cosmetic, 2->food');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('account_manager');
            $table->json('contact_info');
            $table->json('primary_package');
            $table->json('primary_packaging_accessories');
            $table->json('primary_color');
            $table->json('secondary_packaging');
            $table->json('information');
            $table->json('formula_details')->nullable();
            $table->tinyInteger('step')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
