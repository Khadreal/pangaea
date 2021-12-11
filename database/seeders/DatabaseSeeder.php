<?php

namespace Database\Seeders;

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
        $topics = [
            'English Premier League',
            'Spanish La Liga',
            'Champion League',
            'Europa League',
            'Championship League',
            'Bundesliga',
            'Fantasy Premier League'
        ];

        $endpoints = [
            'https://google.com',
            'https://bing.com',
            'https://yahoo.com',
            'https://goal.com',
            'https://arsenal.com',
            'https://wwe.com',
        ];

        $messages = [
            '{"key1":"Salah","key3":"Ronaldo","key4":{"nested":"Dummy"}}',
            '{"key1":"Ramsdale","key3":"Hazard","key4":{"nested":"Dummy"}}',
            '{"key1":"Pepe","key3":"Ramsey","key4":{"nested":"Dummy"}}',
        ];

        foreach( $topics as $topic ) {
            $topic =  \App\Models\Topic::create( [
                'title' => $topic,
                'slug' => $topic
            ] );

            foreach( $endpoints  as $endpoint ) {
                $topic->subscribe()->create( [
                    'endpoint' => $endpoint
                ] );
            }

            foreach( $messages as $message ) {
                $topic->message()->create( [
                    'content' => $message
                ] );
            }
        }
    }
}
