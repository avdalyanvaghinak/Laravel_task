<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Hakust',
        ]);

                         DB::table('categories')->insert([
                             'parent_id' => '1',
                             'name' => 'Man',
                         ]);

                          DB::table('categories')->insert([
                              'parent_id' => '1',
                              'name' => 'Woman',
                          ]);


        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Travel',
        ]);

                          DB::table('categories')->insert([
                              'parent_id' => '4',
                              'name' => 'Europe',
                          ]);

                          DB::table('categories')->insert([
                              'parent_id' => '4',
                              'name' => 'Africa',
                          ]);

        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Car',
        ]);

                           DB::table('categories')->insert([
                               'parent_id' => '7',
                               'name' => 'Mercedes-Benz',
                           ]);

                           DB::table('categories')->insert([
                               'parent_id' => '7',
                               'name' => 'BMW',
                           ]);


        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Mobile',
        ]);

                           DB::table('categories')->insert([
                               'parent_id' => '10',
                               'name' => 'Iphone',
                           ]);

                           DB::table('categories')->insert([
                               'parent_id' => '10',
                               'name' => 'Samsung',
                           ]);
    }

}
