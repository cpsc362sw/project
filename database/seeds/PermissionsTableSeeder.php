<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run seeds for permissions table.
     *
     * NOTE: We may want to add some more permissions in the future.
     *       We will need to add them here and rerun the script.
     *
     * NOTE: Ensure all indexes are properly populated in the database,
     * if your auto_increment for the ID is not starting at 1 run:
     *      ALTER TABLE permissions AUTO_INCREMENT = 1
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ #id 1
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'General administrative, superuser.'
            ],
            [ #id 2
                'name' => 'manager-view',
                'display_name' => 'Manager-View',
                'description' => 'Allows access to view.'
            ],
            [ #id 3
                'name' => 'manager-edit',
                'display_name' => 'Manager-Edit',
                'description' => 'Allows access to edit.'
            ],
            [#id 4
                'name' => 'manager-delete',
                'display_name' => 'Manager-Delete',
                'description' => 'Allows access to delete.'
            ],
            [ #id 5
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'Allows general user dashboard access.'
            ]
        ];

        foreach ($permissions as $permission) {
            DB::table( 'permissions' )->insert($permission);
        }
    }
}
