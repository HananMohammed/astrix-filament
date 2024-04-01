<?php

use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Process::class)->nullable();
            $table->string('name');
            $table->string('company_name');
            $table->string('trade_name');
            $table->string('product_name');
            $table->string('username');
            $table->string('mobile');
            $table->string('email');
            $table->tinyInteger('primary_packaging');
            $table->string('primary_selected_option', 50)->nullable();
            $table->text('primary_packaging_description')->nullable();
            $table->tinyInteger('primary_packaging_accessories');
            $table->string('accessories_option', 50)->nullable();
            $table->text('accessories_description')->nullable();
            $table->string('primary_package_color', 70);
            $table->string('accessories_color', 70);
            $table->tinyInteger('secondary_packaging');
            $table->string('secondary_packaging_option', 50)->nullable();
            $table->string('label_sticker', 50)->nullable();
            $table->text('secondary_description')->nullable();
            $table->boolean('astrix_pharma')->default(false);
            $table->tinyInteger('ingredients');
            $table->tinyInteger('barcode_type');
            $table->string('barcode')->nullable();
            $table->tinyInteger('sfda_registration');
            $table->string('sfda_client_username')->nullable();
            $table->string('sfda_client_password')->nullable();
            $table->tinyInteger('master_formula_details');
            $table->string('active_material_details')->nullable();
            $table->string('product_color_and_odor')->nullable();
            $table->tinyInteger('dose_added_by');
            $table->string('dose_name')->nullable();
            $table->boolean('approved_by_sale')->default(false);
            $table->timestamps();
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
