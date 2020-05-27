<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $count = 2;
//        factory(Product::class, $count)->create();

        DB::table('products')->insert([
            'user_id' => '1',
            'category_id' => '2',
            'title' => 'Vernashapik',
            'price' => '3000 dram',
            'country' => 'Russian',
            'age' => '15-20',
            'image' => 'vernashapik.jpg',
            'description' => 'Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum has been the
                               industry\'s standard dummy text ever since the 1500s, when an
                               unknown printer took a galley of type and
                                scrambled it to make a type specimen book. ',

        ]);


        DB::table('products')->insert([
            'user_id' => '1',
            'category_id' => '3',
            'title' => 'Yupka',
            'price' => '4000 dram',
            'country' => 'America',
            'age' => '15-20',
            'image' => 'yupka.jpg',
            'description' => 'Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum has been the
                               industry\'s standard dummy text ever since the 1500s, when an
                               unknown printer took a galley of type and
                                scrambled it to make a type specimen book. ',

        ]);


        DB::table('products')->insert([
            'user_id' => '1',
            'category_id' => '5',
            'title' => 'England',
            'price' => '400 evro',
            'country' => 'Europe',
            'age' => '18-40',
            'image' => 'england.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);

        DB::table('products')->insert([
            'user_id' => '1',
            'category_id' => '6',
            'title' => 'Angola',
            'price' => '200 evro',
            'country' => 'Afrika',
            'age' => '18-40',
            'image' => 'angola.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);


        DB::table('products')->insert([
            'user_id' => '2',
            'category_id' => '8',
            'title' => 's-class',
            'price' => '200.00 evro',
            'country' => 'Germany',
            'age' => '18-50',
            'image' => 'mersedes.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);


        DB::table('products')->insert([
            'user_id' => '2',
            'category_id' => '9',
            'title' => 'c-class',
            'price' => '300.00 evro',
            'country' => 'Germany',
            'age' => '18-50',
            'image' => 'cclass.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);


        DB::table('products')->insert([
            'user_id' => '2',
            'category_id' => '11',
            'title' => 'ipone X',
            'price' => '500.00 dram',
            'country' => 'Kitay',
            'age' => '10-50',
            'image' => 'ipone.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);



        DB::table('products')->insert([
            'user_id' => '2',
            'category_id' => '12',
            'title' => 'samsung galaxy s9',
            'price' => '500.00 dram',
            'country' => 'Kitay',
            'age' => '10-50',
            'image' => 'samsung.jpg',
            'description' => 'It is a long established fact that a reader will be distracted 
                                   by the readable content of a page when looking at its layout. The point of using 
                                   Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                    to using \'Content here, content here\', making it look like readable English ',

        ]);


    }
}
