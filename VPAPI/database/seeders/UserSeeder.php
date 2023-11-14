<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Hayya"; 
        $user->email = "Hayyaulyasyarof@gmail.com";
        $user->password = bcrypt("bruhcrypte");
        $user->phone = '085156637655';
        $user-> age = 19;
        $user->save();

        $user = new User();
        $user->name = "Buddy"; 
        $user->email = "BuddyBadduy@gmail.com";
        $user->password = bcrypt("bruhcrypte");
        $user->phone = '085156637655';
        $user-> age = 29;
        $user->save();
    }
}
