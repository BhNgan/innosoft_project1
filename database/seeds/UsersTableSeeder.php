<?php

use App\User;
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
        User::create([
            'name'      => 'InnoSoft',
            'username'  => 'innosoft',
            'email'     => 'innosoftcantho@gmail.com',
            'password'  => bcrypt('Inn0@dmin'),
            'active'    => 1,
        ]);
        User::where('username', 'innosoft')->first()->update([
            'id'    => 0
        ]);
    }
}
