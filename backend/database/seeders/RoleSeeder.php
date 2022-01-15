<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
                                       'name' => "lead",
                                       'description' => "Lead of team",
                                       "permission" => true,
                                   ]);

        DB::table('roles')->insert([
                                       'name' => "manager",
                                       'description' => "Manager of team",
                                       "permission" => false,
                                   ]);

        DB::table('roles')->insert([
                                       'name' => "member",
                                       'description' => "Lead of member",
                                       "permission" => false,
                                   ]);
    }
}
