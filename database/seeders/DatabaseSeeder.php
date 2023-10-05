<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            \App\Models\Customer::create([
                'customer_name' => 'user' . $i,
                'customer_description' => 'test',
            ]);
            \App\Models\CustomerAlamat::create([
                'customer_id' => $i,
                'customer_alamat' => 'alamat' . $i,
            ]);
            for ($a = 1; $a <= 10; $a++) {
                \App\Models\Sales::create(
                    [
                        'customer_id' => $i,
                        'total_sales' => rand(10000, 100000),
                        'tanggal_transaksi' => Carbon::create(2022, 1, $a),
                    ],
                );
            }
        }
    }
}
