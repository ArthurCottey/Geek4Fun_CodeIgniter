<?php

namespace App\Models;
use CodeIgniter\Model;

class m_admin extends \CodeIgniter\Model
{
    //Méthode déplacée dans le model m_cosplay. A supprimer
    /*public function getConcours()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('concours');
        $result = $builder->select('id_concours, date_concours, theme_concours, groupe_concours, nbPlace_concours, NbPlaceRestant_concours')->get()->getResult();
        return $result;
    }*/

    //Créer une occurrence dans la table "concours" avec les données saisies par l'administrateur
    public function ajoutConcours($date, $theme, $categAge, $groupe, $nbPlace, $image)
    {
        $data = [
            'date_concours' => $date,
            'theme_concours' => $theme,
            'categAge_concours' => $categAge,
            'groupe_concours' => $groupe,
            'nbPlace_concours' => $nbPlace,
            'nbPlaceRestant_concours' => $nbPlace,
            'imagePageInscription_concours' => $image
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('concours');
        $builder->insert($data);
    }

    //Supprime l'occurrence sélectionnée par l'administrateur
    public function supprimerConcours($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('concours');
        $builder->where('id_concours', $id);
        $builder->delete();
    }

}