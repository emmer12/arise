<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BookPaid;
use App\Notifications\sendWelcome;
use App\Notifications\InvoicePaid;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password','phone','nickname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function sendBooking($product){
        $this->notify(new InvoicePaid($product));
    } 

    public function sendWelcome($user){
        $this->notify(new sendWelcome($user));
    } 


    public function invoice()
    {
        return $this->hasMany('App\Payment');
    }
    
}
