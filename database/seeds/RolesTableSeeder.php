<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * * NOTE: Ensure all indexes are properly populated in the database,
     * if your auto_increment for the ID is not starting at 1 run:
     *      ALTER TABLE roles AUTO_INCREMENT = 1
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [ #id 1
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Governs users and administrative tasks.'
            ],
            [ #id 2
                'name' => 'manager',
                'display_name' => 'Manager',
                'description' => 'Audits users and schedules.'
            ],
            [ #id 3
                'name' => 'user',
                'display_name' => 'General User',
                'description' => 'Utilizes basic tools for application.'
            ]
        ];

        foreach ($roles as $role) {
            DB::table( 'roles' )->insert($role);
        }
    }
}
