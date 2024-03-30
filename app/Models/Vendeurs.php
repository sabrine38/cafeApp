<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendeurs extends Model
{
    use HasFactory;
    protected $table = 'vendeurs';
    protected $fillable = ['NomV', 'PrénomV', 'EmailV', 'mot_de_passV', 'mot_de_passV_confirmé', 'tele', 'adress', 'image', 'id_cafe', 'super_admin_id'];

    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class);
    }
}

