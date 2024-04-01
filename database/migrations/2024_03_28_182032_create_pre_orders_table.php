<?php

use App\Models\Process;
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
        Schema::create('pre_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('trade_name');
            $table->string('product_name');
            $table->string('username');
            $table->string('mobile');
            $table->string('email');
            $table->tinyInteger('primary_packaging');
            $table->string('primary_selected_option')->nullable();


//            $table->bigInteger('product_quantity');
//            $table->string('delivery_duration');
//            $table->string('dosage_licences');
//            $table->string('design_type');
//            $table->foreignIdFor(User::class)->nullable();
//            $table->foreignIdFor(Process::class)->nullable();
//            $table->date('order_date')->nullable();
//            $table->date('register_date')->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_orders');
    }
};
