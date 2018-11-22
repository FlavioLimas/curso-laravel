<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    	 * Gerando um registro a partir da UserFactory (faker)
    	 */

        // $user = new \App\User();
        // $user->create([
        // 'name' => 'Flavio Lima',
        // 'email' => 'flaviolima.s@live.com',
        // 'password' => bcrypt('12345678')
        // ]);
        // 
        
        /**
         * Gerando 30 registros a partir da UserFactory (faker)
         */
        
        factory(App\User::class, 30)->create();
    }
}
