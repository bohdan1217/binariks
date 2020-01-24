<?php
use Illuminate\Database\Seeder;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'pending',
            ],
            [
                'title' => 'done',
            ],
            [
                'title' => 'declined',
            ],
        ];
        DB::table('status')->insert($data);
    }
}
