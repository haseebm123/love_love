<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
  
class CreateAdminUserSeeder extends Seeder
{
   
    public function run()
    {
    
       $role = Role::create(['name' => 'admin', 'slug' => 'admin','display_name' =>'Admin']);
        Role::create(['name' => 'user', 'slug' => 'user','display_name' =>'User']);
        $user = User::create([
            'first_name' => 'David',
            'last_name' => 'Brown',
            'email'       => 'admin@gmail.com',
            'password' => hash::make(12345),
            'role_id' => $role->name,
            'type' => 'admin',
        ]);

        $permissions = Permission::all();

        $role->givePermissionTo(Permission::all());

        $user->assignRole([$role->name]);

        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'Test',
            'email'       => 'user@gmail.com',
            'password' => hash::make(12345),
        ]);
        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'Test',
            'email'       => 'test@gmail.com',
            'password' => hash::make(12345),
        ]);
        $user = User::create([
            'first_name' => 'Me',
            'last_name' => 'Developer',
            'email'       => 'me@gmail.com',
            'password' => hash::make(12345),
        ]);
    }
}
