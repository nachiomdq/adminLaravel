<?php

use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'name'     => 'Auto',
                'friendly_url' =>'auto',
            ],
            [
                'name'     => 'Convencional',
                'friendly_url' =>'convencional',
            ],
            [
                'name'     => 'Radial',
                'friendly_url' =>'radial',
            ],
            [
                'name'     => 'Delantera',
                'friendly_url' =>'delantera',
            ],
            [
                'name'     => 'Trasera',
                'friendly_url' =>'trasera',
            ],
            [
                'name'     => 'Industrial',
                'friendly_url' =>'industrial',
            ],
            [
                'name'     => 'Cámaras de aire',
                'friendly_url' =>'camaras-de-aires',
            ],
            [
                'name'     => 'Protectores',
                'friendly_url' =>'protectores',
            ],

        ]);
    }
}
