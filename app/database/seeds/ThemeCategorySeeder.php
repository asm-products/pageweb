<?php
use Carbon\Carbon;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('themes_categories')->delete();
        DB::table('themes_categories')->insert([
            [
                'name' => 'Photography',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Blogging',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
