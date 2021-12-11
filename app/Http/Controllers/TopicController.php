<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Index page
     * @param Request $request
     * 
     * @return
    */
    public function index( Request $request )
    {
        $filter = ( new Topic )->newQuery();
        $edit = null;

        if( $request->filled( 'q' ) ) {
            $filter->where( 'title', 'like', '%' . $request->q . '%' );
        }


        $topics = $filter->withCount( 'subscribe' )->latest()->paginate( $this->perPage );

        return view( 'templates.topics', [
            'title' => 'Topics',
            'topics' => $topics,
            'edit' => $edit
        ] );
    }

    /**
     * Store topic
     * 
     * @param Request $request
     * 
     * @return
    */
    public function store( Request $request )
    {
        $this->validate( $request, [
            'title' => 'required'
        ] );

        $data = $request->all();
        $data['slug'] = $request->input( 'title' );

        Topic::create( $data );

        return redirect()->route( 'topic.index' )->with( 'success', 'Topic created successfully' );
    }

    /**
     * Delete Topic
     * 
     * @param $id
     * 
     * @return bool
    */
    public function delete( $id ) : bool
    {
        $topic = Topic::find( $id );
        
        return $topic->delete();
    }
}