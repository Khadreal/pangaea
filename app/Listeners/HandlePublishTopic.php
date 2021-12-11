<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Events\PublishTopic;
use App\Models\Message;

class HandlePublishTopic
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PublishTopic  $event
     * 
     * @return void
     */
    public function handle( PublishTopic $event )
    {
        $message = Message::where( 'topic_id', $event->topic->id )->first();
        $subscribers = $event->topic->subscribe;

        foreach( $subscribers as $subscribe ) {
            try {
                Http::post( $subscribe->endpoint, [
                'topic' => $event->topic->title,
                'data' => json_decode( $message->content, false )
                ] );
            } catch( \Exception $e ) {
                error_log( 'Error -- Data not sent to' .$subscribe->endpoint . 'endpoint' );
            }
        }
    }
}