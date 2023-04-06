<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table = 'adresse';
    protected $primaryKey = 'id_adresse';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id_adresse', 'adresse', 'ville', 'governorat', 'code_postal', 'logitude', 'latitude', 'pays'];

    public function medecins()
    {
        return $this->hasMany(Medecin::class, 'id_adresse');
    }
}
