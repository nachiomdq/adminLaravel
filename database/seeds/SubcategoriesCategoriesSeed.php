<?php

use Illuminate\Database\Seeder;

class SubcategoriesCategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Insert relationships
        DB::table('subcategories_categories')->insert([
            [
                'category_id'     => 1,
                'subcategory_id' => 1

            ],
            [
                'category_id'     => 2,
                'subcategory_id' => 2

            ],
            [
                'category_id'     => 2,
                'subcategory_id' => 3

            ],
            [
                'category_id'     => 3,
                'subcategory_id' => 2

            ],
            [
                'category_id'     => 3,
                'subcategory_id' => 3

            ],
            [
                'category_id'     => 4,
                'subcategory_id' => 4

            ],
            [
                'category_id'     => 4,
                'subcategory_id' => 5

            ],
            [
                'category_id'     => 5,
                'subcategory_id' => 2

            ],
            [
                'category_id'     => 5,
                'subcategory_id' => 3

            ],
            [
                'category_id'     => 6,
                'subcategory_id' => 6

            ],
            [
                'category_id'     => 7,
                'subcategory_id' => 7

            ],
            [
                'category_id'     => 7,
                'subcategory_id' => 8

            ],

        ]);
    }
}
