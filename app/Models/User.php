<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Etablissement;
use App\Models\TypeRestaurant;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'email',
        'password',
        'statut',
        'is_actived',
        'is_admin',
        'approved'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function typesResta()
    {
        return $this->hasOne(TypeRestaurant::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function etablissement()
    {
        return $this->hasOne(Etablissement::class);
    }
}
