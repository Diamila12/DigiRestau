<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieConso;
use App\Models\Token_order;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'etablissement_nom',
        'etablissement_logo',
        'etablissement_numero_tel',
        'etablissement_type',
        'etablissement_adresse',
        'etablissement_statut'
    ];

    public function categories()
    {
        return $this->hasMany(CategorieConso::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token_order::class);
    }
}
