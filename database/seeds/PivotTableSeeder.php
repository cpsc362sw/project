<?php

use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds for pivot table 'roles__permissions.
     *
     * This will take the role and point it to the appropriate permissions related.
     *
     * * NOTE: Ensure all indexes are properly populated in the database,
     * if your auto_increment for the ID is not starting at 1 run:
     *      ALTER TABLE roles__permissions AUTO_INCREMENT = 1
     *
     * @return void
     */
    public function run()
    {
        $pivots = [
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 2, 'permission_id' => 2],
            ['role_id' => 2, 'permission_id' => 3],
            ['role_id' => 2, 'permission_id' => 4],
            ['role_id' => 3, 'permission_id' => 5],
        ];

        foreach ($pivots as $pivot) {
            DB::table( 'role__permissions' )->insert($pivot);
        }
    }
}
