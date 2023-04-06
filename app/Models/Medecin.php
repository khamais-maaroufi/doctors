<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $table = 'medecins';
    protected $primaryKey = 'id_med';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id_med', 'id_adresse', 'nom_docteur', 'specialite', 'telephone', 'date'];

    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'id_adresse');
    }
}
