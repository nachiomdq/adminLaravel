<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('categories')->insert([
              [
                  'name'     => 'Auto',
                  'friendly_url' =>'auto',
              ],
              [
                  'name'     => 'Camión',
                  'friendly_url' =>'camion',
              ],
              [
                  'name'     => 'Camioneta',
                  'friendly_url' =>'camioneta',
              ],
              [
                  'name'     => 'Agrícola',
                  'friendly_url' =>'agricola',
              ],
              [
                  'name'     => 'OTR',
                  'friendly_url' =>'otr',
              ],
              [
                  'name'     => 'Industrial',
                  'friendly_url' =>'industrial',
              ],
              [
                  'name'     => 'Cámaras/Protectores',
                  'friendly_url' =>'camaras-protectores',
              ],

          ]);
    }
}
