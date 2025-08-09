<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $superAdmin=User::create([
          'name' =>'Super Admin',
          'email' =>'superadmin@gmail.com',
          'password' =>Hash::make('12345678')
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin=User::create([
          'name' =>'Admin',
          'email' =>'admin@gmail.com',
          'password' =>Hash::make('12345678')
        ]);
        $admin->assignRole('Admin');

         $visitor=User::create([
          'name' =>'Visitor',
          'email' =>'visitor@gmail.com',
          'password' =>Hash::make('12345678')
        ]);
        $visitor->assignRole('Visitor');
    }
}
