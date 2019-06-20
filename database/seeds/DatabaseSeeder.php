<?php

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
        $business_streams = [
            ['id' => '1', 'business_stream_name' => 'IT - Software'],
            ['id' => '2', 'business_stream_name' => 'Banking / Financial Services'],
            ['id' => '3', 'business_stream_name' => 'Manufacturing'],
            ['id' => '4', 'business_stream_name' => 'Engineering / Construction'],
            ['id' => '5', 'business_stream_name' => 'Education / Training'],
            ['id' => '6', 'business_stream_name' => 'BPO / Call Center'],
            ['id' => '7', 'business_stream_name' => 'Internet / E-Commerce'],
            ['id' => '8', 'business_stream_name' => 'IT - Hardware / Networking'],
            ['id' => '9', 'business_stream_name' => 'Automobile / Auto Ancillaries'],
            ['id' => '10', 'business_stream_name' => 'Telecom / ISP'],
            ['id' => '11', 'business_stream_name' => 'Medical / Healthcare'],
            ['id' => '12', 'business_stream_name' => 'Advertising / MR / PR / Events'],
            ['id' => '13', 'business_stream_name' => 'Agriculture / Dairy'],
            ['id' => '14', 'business_stream_name' => 'Animation'],
            ['id' => '15', 'business_stream_name' => 'Architecture / Interior Design'],
        ];

        $job_types = [
            ['id' => '1','job_type' => 'Part Time'],
            ['id' => '2','job_type' => 'Full Time'],
        ];

        $skill_sets = [
            ['id' => '1','skill_set_name' => 'Skill 1'],
            ['id' => '2','skill_set_name' => 'Skill 2'],
            ['id' => '3','skill_set_name' => 'Skill 3'],
            ['id' => '4','skill_set_name' => 'Skill 4'],
            ['id' => '5','skill_set_name' => 'Skill 5'],
            ['id' => '6','skill_set_name' => 'Skill 6'],
            ['id' => '7','skill_set_name' => 'Skill 7'],
            ['id' => '8','skill_set_name' => 'Skill 8'],
            ['id' => '9','skill_set_name' => 'Skill 9'],
            ['id' => '10','skill_set_name' => 'Skill 10'],
            ['id' => '11','skill_set_name' => 'Skill 11'],
            ['id' => '12','skill_set_name' => 'Skill 12'],
            ['id' => '13','skill_set_name' => 'Skill 13'],
            ['id' => '14','skill_set_name' => 'Skill 14'],
            ['id' => '15','skill_set_name' => 'Skill 15'],
        ];


        \App\BusinessStream::insert($business_streams);
        \App\JobType::insert($job_types);
        \App\SkillSet::insert($skill_sets);
        factory('App\Admin', 1)->create();
        factory('App\User', 20)->create();
        factory('App\Employer', 10)->create();
        factory('App\JobLocation', 20)->create();
        factory('App\Company', 30)->create();
        factory('App\JobPost', 60)->create();
        factory('App\JobPostSkillSet', 80)->create();
    }
}
