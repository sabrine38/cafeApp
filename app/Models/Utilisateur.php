<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';
    
    protected $fillable = [ 'email', 'motpass', 'Confirm_mot_de_pass', 'nom', 'prenom', 'type_utilisateur', 'telephone', 'adress', 'image', 'super_admin_id'];
    
    protected $casts = [
        // Add casting for attributes if necessary
    ];

    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'super_admin_id');
    }
}
