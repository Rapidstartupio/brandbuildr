<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddPromptsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refs = [
            '3.1.02',
            '3.1.03',
            '3.1.04',
            '3.1.05',
            '3.1.06',
            '3.1.07',
            '3.1.08',
            '3.1.09',
            '3.1.10',
            '3.1.11',
            '3.1.12',
            '3.1.13',
            '3.1.14',
            '3.1.15',
            '3.1.16',
        ];
        foreach ($refs as $ref) {
            \DB::table('project_prompts')->insert(array(
                array(
                    'name' => 'Competitors 1 - Analysis ' . $ref,
                    'prompt' => "{{g-question:3.1.01}}:{{g-answer:$ref}}",
                    'created_at' => '2023-10-18 00:00:00',
                    'updated_at' => '2023-10-18 00:00:00',
                )
            ));
        }
    }
}
