<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRER extends Model
{
    use HasFactory;

    protected $connection = 'RER'; // Nom de la connexion pour RER
    protected $table = 'documentpublic'; // Nom de la table dans la base de données RER
    protected $fill = [
        'nom', 'chemin', 'nom_utilisateur', 'prive' , 'Univ'
    ];

    // Le reste du modèle...
}
