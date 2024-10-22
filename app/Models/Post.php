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
    protected $fillable = ['user_id', 'title', 'content'];
    //============================================================================================================
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    //============================================================================================================
    public function registerMediaConversions(Media $media = null): void{
        $this->addMediaConversion('thumb')
            ->format('webp')
            ->width(120)
            ->height(100)
            ->nonQueued();


        $this->addMediaConversion('poster')
            ->format('webp')
            ->width(700)
            // ->height(120)
            ->nonQueued();
    }
    //============================================================================================================
}
