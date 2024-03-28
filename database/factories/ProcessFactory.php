<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class ProcessFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        $projectType = [1, 2];
        $companies = ['Astrix Com.', 'COSMETIC Com.', 'CodeBase Com.'];
        $products = ['Face mask', 'Lip care products', 'Body care products', 'Hydroalcoholic perfumes',];
        $tradeNames = ['corporation filings', 'taxes', 'compliance'];
        $material = ['plastic', 'glasses', 'transparent'];
        $user_id = User::first()->id;

        return [
            'project_type' => $projectType[array_rand($projectType)],
            'user_id' => $user_id,
            'account_manager' => [
                'username' => fake()->name(),
                'company_name' => $companies[array_rand($companies)],
                'product_name' => $products[array_rand($products)],
                'trade_name' => $tradeNames[array_rand($tradeNames)],
            ],
            'contact_info' => [
                'username' => fake()->name(),
                'mobile_number' => '12345678934',
                'email' => fake()->safeEmail(),
            ],
            'primary_package' => [
                'dimensions' => '35*35',
                'material' => $material[array_rand($material)],
                'description' => fake()->text(50),
            ],
            'primary_packaging_accessories' => [
                'accessories' => ['cap', 'flip_top'],
                'description' => fake()->text(50),

            ],
            'primary_color' => [
                'primary_packaging_color' => array_rand(['red', 'white', 'yellow']),
                'primary_accessories_color' => array_rand(['red', 'white', 'yellow']),
            ],
            'secondary_packaging' => [
                'primary_options' => ['direct_printing', 'label_stickers'],
                'label_sticker' => ['colored', 'transparent'],
                'secondary_specifications' => ['stamp', 'coverage'],
                'description' => fake()->text(50),
            ],
            'information' => [
                'add_manufacture_info' => true,
                'barcode_type' => 'form_client',
                'barcode' => 'link of barcode',
                'spda_registration' => 'client_account',
                'username' => fake()->name(),
                'password' => static::$password ??= Hash::make('password'),
            ],
            'step' => 1,

        ];
    }

}
