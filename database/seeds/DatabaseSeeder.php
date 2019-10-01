<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(SuperAdminAcount::class);
        $this->call(SettingSeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(CompletionCriteriaSeeder::class);
        $this->call(LessonTypeSeeder::class);
        $this->call(BadgeTypeSeeder::class);
    }
}
