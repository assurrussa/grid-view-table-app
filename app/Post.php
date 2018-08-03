<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use SoftDeletes;

    public static $types = [
        'post'    => 'post',
        'comment' => 'comment',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'preview',
        'description',
        'body',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Post $query
     * @param int  $int
     *
     * @return mixed
     */
    public function scopeById($query, $int)
    {
        return $query->where('id', '=', $int);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByType($query, $string)
    {
        return $query->where('type', '=', $string);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByTitle($query, $string)
    {
        return $query->where('title', '=', $string);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByTitleLike($query, $string)
    {
        return $query->where('title','like', $string . '%');
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByUserName($query, $string)
    {
        return $query->whereHas('user', function ($query) use ($string) {
            return $query->where('name', 'like', $string . '%');
        });
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByPublishedAtRange($query, $string)
    {
        $list = explode('_', $string);
        $from = \Carbon\Carbon::parse($list[0])->format('Y-m-d');
        $to = \Carbon\Carbon::parse($list[1])->format('Y-m-d');
        return $query->whereBetween('published_at', [$from, $to]);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByPublishedAt($query, $string)
    {
        $date = \Carbon\Carbon::parse($string)->format('Y-m-d');
        return $query->whereDate('published_at', '=', $date);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByCreatedAt($query, $string)
    {
        $date = \Carbon\Carbon::parse($string)->format('Y-m-d');
        return $query->whereDate('created_at', '=', $date);
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByCountryId($query, $string)
    {
        return $query->whereHas('user', function ($query) use ($string) {
            return $query->whereHas('country', function ($query) use ($string) {
                return $query->where('id', '=', $string);
            });
        });
    }

    /**
     * @param Post   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByCityId($query, $string)
    {
        return $query->whereHas('user', function ($query) use ($string) {
            return $query->whereHas('city', function ($query) use ($string) {
                return $query->where('id', '=', $string);
            });
        });
    }

    /**
     * @return array
     */
    public function toFieldsAmiGrid(): array
    {
        return [
            'id',
            'user_id',
            'title',
            'preview',
            'description',
            'body',
        ];
    }
}
