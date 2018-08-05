<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property integer                                                                                                        $id
 * @property integer                                                                                                        $country_id
 * @property integer                                                                                                        $city_id
 * @property string                                                                                                         $name
 * @property string                                                                                                         $preview
 * @property string                                                                                                         $email
 * @property string                                                                                                         $password
 * @property string                                                                                                         $remember_token
 * @property string                                                                                                         $address
 * @property \Carbon\Carbon                                                                                                 $created_at
 * @property \Carbon\Carbon                                                                                                 $updated_at
 * @property \Carbon\Carbon                                                                                                 $deleted_at
 *
 * @package App
 *
 * @property-read \App\City                                                                                                 $city
 * @property-read \App\Country                                                                                              $country
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[]                                                      $posts
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{

    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'city_id',
        'name',
        'preview',
        'email',
        'password',
        'remember_token',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * access type: integer, real, float, double, string, boolean, object, array, collection, date и datetime
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'integer',
        'country_id'     => 'integer',
        'city_id'        => 'integer',
        'name'           => 'string',
        'preview'        => 'string',
        'email'          => 'string',
        'password'       => 'string',
        'remember_token' => 'string',
        'address'        => 'string',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
        'deleted_at'     => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|City
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
