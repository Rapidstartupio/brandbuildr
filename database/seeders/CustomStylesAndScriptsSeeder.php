<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomStylesAndScriptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('settings')->whereIn('key',array('admin.custom_header_code','admin.custom_footer_code','admin.custom_css','site.custom_header_code','site.custom_footer_code','site.custom_css')) ->delete();

        \DB::table('settings')->insert(array (
            0 =>
            array (
	            'key' => 'admin.custom_header_code',
	            'display_name' => 'CUSTOM HEADER CODE',
                'value' => '',
                'details' => NULL,
	            'type' => 'rich_text_box',
	            'order' => 6,
	            'group' => 'Admin',
            ),
            1 =>
            array (
	            'key' => 'admin.custom_footer_code',
	            'display_name' => 'CUSTOM FOOTER CODE',
                'value' => '',
                'details' => NULL,
	            'type' => 'rich_text_box',
	            'order' => 7,
	            'group' => 'Admin',
            ),
            2 =>
            array (
	            'key' => 'admin.custom_css',
	            'display_name' => 'CUSTOM CSS',
                'value' => '',
	            'type' => 'text_area',
	            'order' => 8,
	            'group' => 'Admin',
	            'value' => '<style type="text/css">
	/*your code here*/

	</style>',
                'details' => NULL,
                
            ),
            3 =>
            array (
	            'key' => 'site.custom_header_code',
	            'display_name' => 'CUSTOM HEADER CODE',
                'value' => '',
                'details' => NULL,
	            'type' => 'rich_text_box',
	            'order' => 5,
	            'group' => 'Site',
            ),
            4 =>
            array (
	            'key' => 'site.custom_footer_code',
	            'display_name' => 'CUSTOM FOOTER CODE',
                'value' => '',
                'details' => NULL,
	            'type' => 'rich_text_box',
	            'order' => 6,
	            'group' => 'Site',
            ),
            5 =>
            array (
	            'key' => 'site.custom_css',
	            'display_name' => 'CUSTOM CSS',
                'value' => '',
                'details' => NULL,
	            'type' => 'text_area',
	            'order' => 7,
	            'group' => 'Site',
	             'value' => '<style type="text/css">
	/*your code here*/
	
	</style>',
            )
     	));
    }

}