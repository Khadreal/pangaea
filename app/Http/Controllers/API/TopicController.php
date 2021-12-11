<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Events\PublishTopic;
use App\Models\Topic;


class TopicController extends APIController
{
    /**
     * Subscribe to a topic
     * 
     * @param Request $request
     * @param string $param -- Topic slug or ID
     * 
    */
    public function subscribe( Request $request, string $param )
    {
        $whereArgs = [
            'slug' => $param,
            'active' => 1
        ];
        $topic = Topic::where( $whereArgs )->orWhere( 'id', $param )->first();

        if( ! $topic ) {
            return $this->errorResponse( 'Topic doesn\'t exist', "$param is not a valid topic", Response::HTTP_NOT_FOUND );   
        }

        $url = $request->input( 'url' );

        // Check if url is empty.
        if ( ! $url ) {
            return $this->errorResponse( 'URL is required', null, Response::HTTP_NOT_ACCEPTABLE );
        }

        // Check if url is valid url.
        if( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
            return $this->errorResponse( 'URL is invalid', null, Response::HTTP_NOT_ACCEPTABLE );
        }

        $topic->subscribe()->create( ['endpoint' => $url ] );

        return $this->successResponse( 'OK', [
            'url' => $param,
            'topic' => $topic->title
        ] );
    }

    /**
     * Publish topic
     * @param Request $request
     * @param string $param -- Topic slug or ID
     * 
     * @return 
    */
    public function publish( Request $request, string $param )
    {
        $whereArgs = [
            'slug' => $param,
            'active' => 1
        ];

        $topic = Topic::where( $whereArgs )->orWhere( 'id', $param )->with( 'subscribe' )->first();

        if( ! $topic ) {
            return $this->errorResponse( 'Topic doesn\'t exist', "$param is not a valid topic", Response::HTTP_NOT_FOUND );
        }

        $message = $request->input( 'data' );

        if( ! $message ) {
            return $this->errorResponse( 'Data doesn\'t exist', 'All data must be added to data key', Response::HTTP_NOT_FOUND );
        }

        $convertDataToObject = json_encode( $message );

        $retval = $topic->message()->create( [ 'content' => $convertDataToObject ] );

        //Event publish
        event( new PublishTopic( $topic ) );

        return $this->successResponse( 'OK', [
            'topic' => $topic->title,
            'pubish' => $retval->exists()
        ] );
    }
}