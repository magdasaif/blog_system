<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    //============================================================================================================
    use HasFactory, InteractsWithMedia;
    //============================================================================================================
    protected $fillable = ['user_id', 'title', 'content', 'comments'];
    //============================================================================================================
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //============================================================================================================
    public function registerMediaConversions(Media $media = null): void{
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);

        $this->addMediaConversion('poster')
            ->width(200)
            ->height(120);
    }
    //============================================================================================================

}
