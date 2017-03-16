<?php

use Illuminate\Database\Seeder;

class ProgrammerTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert(
    	array(
        		array(
        			'name' => 'WEB-DEVELOPER',
        			'type' => 'IT-Programmer',
        			'created_at' => date('Y-m-d h:i:s'),
        			'updated_at' => date('Y-m-d h:i:s')
    			),
    			array(
    				'name' => 'RECEPTIONIST',
    				'type' => 'Receptionist',
    				'created_at' => date('Y-m-d h:i:s'),
        			'updated_at' => date('Y-m-d h:i:s')
				)
    		)
    	);
    }
}
