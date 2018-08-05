<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\City
 *
 * @property integer                                                   $id
 * @property integer                                                   $country_id
 * @property string                                                    $name
 * @property string                                                    $slug
 * @property \Carbon\Carbon                                            $created_at
 * @property \Carbon\Carbon                                            $updated_at
 *
 * @property-read \App\City                                            $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City byNameLike($string)
 * @mixin \Eloquent
 */
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
     * access type: integer, real, float, double, string, boolean, object, array, collection, date и datetime
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'country_id' => 'integer',
        'name'       => 'string',
        'slug'       => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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
