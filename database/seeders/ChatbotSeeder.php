<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatbotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->whereIn('key', [
            'openai.chatbot_system_message',
        ])->delete();
        \DB::table('settings')->insert(array(
            0 =>
            array(
                'key' => 'openai.chatbot_system_message',
                'display_name' => 'Chatbot System Message',
                'value' => 'You are a helpful Brand Builder assistant from who helps companies and entreprenuers build their businesse.',
                'details' => '',
                'type' => 'text_area',
                'order' => 1,
                'group' => 'Openai',
            ),
        ));
    }
}
