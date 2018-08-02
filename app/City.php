<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|City
     */
    public function country()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @param City   $query
     * @param string $string
     *
     * @return mixed
     */
    public function scopeByNameLike($query, $string)
    {
        return $this->where('name', 'like', $string . '%');
    }
}
