<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate(); 
        
        $adminRole = Role::where('name', 'admin')->first();
        $commentatorRole = Role::where('name', 'commentator')->first();
        $bloggerRole = Role::where('name', 'blogger')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'username' => 'Admin',
            'name' => 'Admin',
            'lastname' => 'Admin',
            'birthdate' => '1995-10-18',
            'email' => 'admin@hotmail.fr',
            'password' => bcrypt('admin'),
        ]);

        $commentator = User::create([
            'username' => 'Commentator',
            'name' => 'commentator',
            'lastname' => 'commentator',
            'birthdate' => '1995-10-18',
            'email' => 'commentator@hotmail.fr',
            'password' => bcrypt('commentator'),
        ]);

        $blogger = User::create([
            'username' => 'Blogger',
            'name' => 'Blogger',
            'lastname' => 'Blogger',
            'birthdate' => '1995-10-18',
            'email' => 'blogger@hotmail.fr',
            'password' => bcrypt('blogger'),
        ]);

        $user = User::create([
            'username' => 'User',
            'name' => 'User',
            'lastname' => 'User',
            'birthdate' => '1995-10-18',
            'email' => 'user@hotmail.fr',
            'password' => bcrypt('user'),
        ]);

        $admin->roles()->attach($adminRole);
        $commentator->roles()->attach($commentatorRole);
        $blogger->roles()->attach($bloggerRole);
        $user->roles()->attach($userRole);
    }
}
