<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_id', 'content',
    ];

    /**
     * 
     * Topic relationship
    */
    public function topic()
    {
        return $this->belongsTo( Topic::class );
    }
}
