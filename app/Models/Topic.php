<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'active'
    ];

    /**
     * Set slug attribute
     * @param string $value
     *
     * @return void
     */
    public function setSlugAttribute( string $value ) : void
    {
        $slug = $this->generateUniqueSlug( Str::slug( $value ) ) ;

        $this->attributes['slug'] = $slug;
    }

    /**
     * Generate slug
     *
     * @param string $slug
     * 
     * @return string
     */
    private function generateUniqueSlug( string $slug ): string
    {
        $slugs = Topic::where( 'slug', 'like', $slug .'%' )->get();

        if( ! $slugs->contains( 'slug', $slug ) ) {
            return $slug;
        }

        $i = 1;
        $isContain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if ( ! $slugs->contains( 'slug', $newSlug ) ) {
                $isContain = false;
                $slug = $newSlug;
            }
            $i++;

        } while( $isContain );

        return $slug;
    }

    /**
     * Subscriber relationship
     * 
     * @return 
    */
    public function subscribe()
    {
        return $this->hasMany( Subscribe::class );
    }

    /**
     * Subscriber relationship
     * 
     * @return 
    */
    public function message()
    {
        return $this->hasMany( Message::class );
    }
}
