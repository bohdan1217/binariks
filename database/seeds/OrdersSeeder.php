<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $data[] = [
                'user_id' => rand(1,5),
                'status_id' => 1,
                'created_at' => date('Y-m-d'),
            ];
        }
        DB::table('orders')->insert($data);
    }
}
