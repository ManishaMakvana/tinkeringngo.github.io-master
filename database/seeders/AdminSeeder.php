<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert multiple admin records into the admins table
        Admin::create([
            'username' => 'manisha',  // First admin username
            'password' => Hash::make('manisha1')  // First admin hashed password
        ]);

        Admin::create([
            'username' => 'admin',  // Second admin username
            'password' => Hash::make('admin2')  // Second admin hashed password
        ]);

       
        
    }
}
