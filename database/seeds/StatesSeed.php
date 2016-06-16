<?php

use Illuminate\Database\Seeder;

class StatesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('states')->insert([
              [
                  'name'     => 'Buenos Aires',
              ],
              [
                  'name'     => 'Córdoba',

              ],
              [
                  'name'     => 'San Luis',

              ],
              [
                  'name'     => 'Mendoza',

              ],
              [
                  'name'     => 'Neuquén',

              ],
              [
                  'name'     => 'Jujuy',
              ],

              [
                  'name'     => 'Salta',
              ],

              [
                  'name'     => 'Tucumán',
              ]

          ]);
    }
}
