<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property integer                                                   $id
 * @property string                                                    $name
 * @property string                                                    $slug
 * @property string                                                    $code
 * @property string                                                    $lang
 * @property \Carbon\Carbon                                            $created_at
 * @property \Carbon\Carbon                                            $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\City[] $cities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @mixin \Eloquent
 */
class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'code',
        'lang',
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
        'name'       => 'string',
        'slug'       => 'string',
        'code'       => 'string',
        'lang'       => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|City
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
