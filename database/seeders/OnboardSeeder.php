<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->whereIn('key', [
            'onboard.step1_title',
            'onboard.step1_description',
            'onboard.step1_video_link',
            'onboard.step1_cta',
            'onboard.step2_title',
            'onboard.step2_description',
            'onboard.step2_cta',
            'onboard.step3_title',
            'onboard.step3_description',
            'onboard.step3_cta',
            'onboard.step4_title',
            'onboard.step4_description',
            'onboard.step4_cta',
            'onboard.step5_title',
            'onboard.step5_description',
            'onboard.step5_cta',
        ])->delete();
        \DB::table('settings')->insert(array(
            0 =>
            array(
                'key' => 'onboard.step1_title',
                'display_name' => 'Step 1 Title',
                'value' => 'Watch Video',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Onboard',
            ),
            1 =>
            array(
                'key' => 'onboard.step1_description',
                'display_name' => 'Step 1 Description',
                'value' => '',
                'details' => '',
                'type' => 'text_area',
                'order' => 2,
                'group' => 'Onboard',
            ),
            2 =>
            array(
                'key' => 'onboard.step1_video_link',
                'display_name' => 'Step 1 Video Link',
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 3,
                'group' => 'Onboard',
            ),
            3 =>
            array(
                'key' => 'onboard.step1_cta',
                'display_name' => 'Step 1 CTA',
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Onboard',
            ),
            4 =>
            array(
                'key' => 'onboard.step2_title',
                'display_name' => 'Step 2 Title',
                'value' => 'Set up Profile',
                'details' => '',
                'type' => 'text',
                'order' => 5,
                'group' => 'Onboard',
            ),
            5 =>
            array(
                'key' => 'onboard.step2_description',
                'display_name' => 'Step 2 Description',
                'value' => 'Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.',
                'details' => '',
                'type' => 'text_area',
                'order' => 6,
                'group' => 'Onboard',
            ),
            6 =>
            array(
                'key' => 'onboard.step2_cta',
                'display_name' => 'Step 2 CTA',
                'value' => '/settings/profile',
                'details' => '',
                'type' => 'text',
                'order' => 7,
                'group' => 'Onboard',
            ),
            7 =>
            array(
                'key' => 'onboard.step3_title',
                'display_name' => 'Step 3 Title',
                'value' => 'Add First Client',
                'details' => '',
                'type' => 'text',
                'order' => 8,
                'group' => 'Onboard',
            ),
            8 =>
            array(
                'key' => 'onboard.step3_description',
                'display_name' => 'Step 3 Description',
                'value' => 'Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.                ',
                'details' => '',
                'type' => 'text_area',
                'order' => 9,
                'group' => 'Onboard',
            ),
            9 =>
            array(
                'key' => 'onboard.step3_cta',
                'display_name' => 'Step 3 CTA',
                'value' => '/projects/clients/create',
                'details' => '',
                'type' => 'text',
                'order' => 10,
                'group' => 'Onboard',
            ),
            10 =>
            array(
                'key' => 'onboard.step4_title',
                'display_name' => 'Step 4 Title',
                'value' => 'Explore Strategies',
                'details' => '',
                'type' => 'text',
                'order' => 11,
                'group' => 'Onboard',
            ),
            11 =>
            array(
                'key' => 'onboard.step4_description',
                'display_name' => 'Step 4 Description',
                'value' => 'Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.',
                'details' => '',
                'type' => 'text_area',
                'order' => 12,
                'group' => 'Onboard',
            ),
            12 =>
            array(
                'key' => 'onboard.step4_cta',
                'display_name' => 'Step 4 CTA',
                'value' => '/dashboard/strategy-hub/explore-strategies',
                'details' => '',
                'type' => 'text',
                'order' => 13,
                'group' => 'Onboard',
            ),
            13 =>
            array(
                'key' => 'onboard.step5_title',
                'display_name' => 'Step 5 Title',
                'value' => 'Start First Project',
                'details' => '',
                'type' => 'text',
                'order' => 14,
                'group' => 'Onboard',
            ),
            14 =>
            array(
                'key' => 'onboard.step5_description',
                'display_name' => 'Step 5 Description',
                'value' => 'Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.',
                'details' => '',
                'type' => 'text_area',
                'order' => 15,
                'group' => 'Onboard',
            ),
            15 =>
            array(
                'key' => 'onboard.step5_cta',
                'display_name' => 'Step 5 CTA',
                'value' => '/projects/create',
                'details' => '',
                'type' => 'text',
                'order' => 16,
                'group' => 'Onboard',
            ),
        ));
    }
}
