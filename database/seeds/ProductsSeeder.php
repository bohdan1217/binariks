<?php
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
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
                'title' => 'test'.$i,
                'alias' => 'alias-'.$i,
                'content' => 'content',
                'price' => rand(40,200),
            ];
        }


        DB::table('products')->insert($data);
    }
}
