<?php

use Illuminate\Database\Seeder;
use App\Event;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['title' => 'Rom Event', 'start_date' => '2019-04-10', 'end_date' => '2019-05-15'],
            ['title' => 'Coyala Event', 'start_date' => '2019-04-11', 'end_date' => '2019-05-16'],
            ['title' => 'Lara Event', 'start_date' => '2019-04-06', 'end_date' => '2019-05-22'],
        ];

        foreach ($data as $key => $value) {
            Event::create($value);
        }
    }
}
