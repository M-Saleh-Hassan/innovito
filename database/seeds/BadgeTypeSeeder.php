<?php

use App\Models\BadgeType;
use Illuminate\Database\Seeder;

class BadgeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BadgeType::firstOrCreate([
            'type' => 'Category'
        ]);
        BadgeType::firstOrCreate([
            'type' => 'Course'
        ]);
        BadgeType::firstOrCreate([
            'type' => 'Lesson'
        ]);
        BadgeType::firstOrCreate([
            'type' => 'Track'
        ]);

    }
}
