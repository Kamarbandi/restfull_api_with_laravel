<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = [
        'published_at'
    ];


    /**
     * Только опубликованные посты
     * Опубликованными постами считаются те,
     * у которых стоит дата публикации, и при
     * этом она не в будущем (отложенная публикация)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query) {
        return $query->whereNotNull('published_at')
            ->whereDate('published_at', '<=', today());
    }

    /**
     * Поиск постов по заголовку или slug
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $q
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQ($query, string $q) {
        return $query->where(function (Builder $query) use ($q) {
            $term = "%$q%";
            return $query->orWhere('title', 'like', $term)
                ->orWhere('slug', 'like', $term);
        });
    }

    /**
     * Только те посты которые имеют видео
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $has
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasVideo($query, bool $has = true) {
        if ($has) {
            return $query->whereNotNull('video_url');
        } else {
            return $query->whereNull('video_url');
        }
    }

    /**
     * Только те посты которые НЕ имеют видео
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasNotVideo($query) {
        return $query->hasVideo(false);
    }
}
