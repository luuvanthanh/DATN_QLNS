<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        // $this->call(DepartmentSeeder::class);
        // $this->call(WorkerSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(WorkerSeeder::class);
<<<<<<< HEAD
        // $this->call(PositionSeeder::class);
       
=======
        $this->call(PositionSeeder::class);
>>>>>>> 322a2f9aefc0ec0b263109b93ee0a6b3f7c24bf0
    }
}
