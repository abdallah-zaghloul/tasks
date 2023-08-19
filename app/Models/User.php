<?php
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 *
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var string
     */
    protected  $table = 'users';


    /**
     * @var string
     */
    protected  $guard = 'user';


    /**
     * @var bool
     */
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];


    /**
     * @var array
     */
//    protected $attributes = [];


    /**
     * @var string[]
     */
    protected $appends = [
        'full_name',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param $fullName
     * @return string|null
     */
    public function getFullNameAttribute($fullName): ?string
    {
        return $fullName ?? $this->getAttribute('first_name').' '.$this->getAttribute('last_name');
    }
}
