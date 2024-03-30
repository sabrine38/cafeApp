<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;
    protected $table = 'super_admins';
    protected $fillable = ['nomS', 'prenomS', 'emailS', 'mot_de_passeS'];

    public function vendeurs()
    {
        return $this->hasMany(Vendeur::class);
    }
}
