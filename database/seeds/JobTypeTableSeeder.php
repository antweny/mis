<?php

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jobTypes = array(
            array('name' => 'Full time'),
            array('name' => 'Part time'),
            array('name' => 'Intern'),
            array('name' => 'Volunteer'),
            array('name' => 'Contract'),
        );

        foreach($jobTypes as $jobType){
            JobType::create($jobType);
        }
    }
}
