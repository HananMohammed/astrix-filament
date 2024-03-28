<?php

namespace Database\Seeders;

use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = Process::select('id')->get();
        $companies = ['Astrix Com.', 'COSMETIC Com.', 'CodeBase Com.'];
        $products = ['Face mask', 'Lip care products', 'Body care products', 'Hydroalcoholic perfumes',];
        $user_id = User::first()->id;

        foreach ($processes as $process) {
            DB::table('pre_orders')->insert([
                'company_name' => $companies[array_rand($companies)],
                'product_name' => $products[array_rand($products)],
                'product_quantity' => 5,
                'delivery_duration' => '2 Weeks',
                'dosage_licences' => 'dosage licences dosage licences',
                'design_type' => 'New Design',
                'user_id' => $user_id,
                'process_id' => $process->id,
                'order_date' => date('Y-m-d'),
                'register_date' => date('Y-m-d'),
            ]);
        }

    }
}
