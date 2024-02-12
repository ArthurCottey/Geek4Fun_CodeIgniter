<?php

namespace App\Models;
use CodeIgniter\Model;
class m_cosplay extends \CodeIgniter\Model
{
    //Renvoie la liste des concours existant
    public function getConcours()
    {
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder = $db->table('concours');
        $query = $builder->select('id_concours, date_concours, theme_concours, categAge_concours, groupe_concours, nbPlace_concours, NbPlaceRestant_concours, imagePageInscription_concours');
        //Si l'utilisateur n'est pas un administrateur, renvoie uniquement les concours de la tranche d'âge de l'utilisateur (mineur ou majeur)
        if ($session->get("habilitation") == 1)
        {
            //Si l'utilisateur a moins de 18 ans
            if ($session->get('age') < 18)
            {
                $result = $query->where('categAge_concours', 0);
            }
            //Si l'utilisateur a 18 ans ou plus
            else
            {
                $result = $query->where('categAge_concours', 1);
            }
            $groupeUser = $session->get("idGroupe");
            //Si l'utilisateur appartient à un groupe, revoie uniquement les concours destinés aux groupes
            if (!empty($groupeUser))
            {
                $result = $result->where('groupe_concours', 1)
                    ->get();
            }
            //Si l'utilisateur ne fait pas parti d'un groupe renvoie uniquement les concours individuels
            else
            {
                $result = $result->where('groupe_concours', 0)
                    ->get();
            }
        }
        //Si l'utilisateur est un administrateur, revoie tous les concours
        else
        {
            $result = $query->get();
        }
        return $result->getResult();
    }

    //Retourne le chemin de l'image de la page d'inscription aux concours
    public function getImagePageInscription($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('concours');
        $lienImage = $builder->select('imagePageInscription_concours')
            ->where('id_concours', $id)
            ->get()
            ->getResult();
        return $lienImage;
    }

    //Ajoute une occurrence dans la table "inscription", l'utilisateur est inscrit à un concours
    public function inscriptionUserBdd($id)
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $data = [
            "id_concours" => $id,
            "id_user" => $session->get("id"),
            //Dans un premier temps, les champs sont prennent la valeur "null". Ils seront modifié si l'utilisateur upload des fichiers
            "imageRef_inscription" => null,
            "bandeSon_inscription" => null,
            "video_inscription" => null,
        ];
        $builder = $db->table('inscription');
        $builder->insert($data);
        $session->set('idConcours', $id);
    }

    //Si l'utilisateur est inscrit à un concours, retourne l'id du concours
    public function verifConcoursCosplay()
    {
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder = $db->table('inscription');
        $query = $builder->select("id_concours")
            ->where("id_user", $session->get("id"))
            ->get()
            ->getResult();
        return $query;
    }

    //Renvoie le nombre de place restante du concours dont l'id est passé en paramètre
    public function checkNbPlaceDispo(String $idConcours)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('concours');
        $query = $builder->select("nbPlaceRestant_concours")
            ->where("id_concours", $idConcours)
            ->get()
            ->getResult();
        return $query;
    }

    //Supprime l'occurrence ciblée dans la table "inscription". Désincrit l'utilisateur du concours
    public function supprInscriptionUserBdd()
    {
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder = $db->table('inscription');
        $builder->where('id_user', $session->get("id"));
        $builder->delete();
    }

    //Ajoute les liens des files uploadés par l'utilisateur lors de son inscription dans l'occurrence précedemment créée
    public function ajoutFilesInscription($cheminImage, $cheminMusique, $cheminVideo)
    {
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder = $db->table('inscription');
        $builder->set('imageRef_inscription', $cheminImage);
        //Si $cheminMusique différent de null, mise à jour du champ "bandeSon_inscription"
        if ($cheminMusique != null)
        {
            $builder->set('bandeSon_inscription', $cheminMusique);
        }
        //Si $cheminVideo différent de null, mise à jour du champ "video_inscription"
        if ($cheminVideo != null)
        {
            $builder->set('video_inscription', $cheminVideo);
        }
        $builder->where('id_user', $session->get("id"))
            ->update();
    }

    public function getFilesInscription()
    {
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder = $db->table('inscription');
        $result = $builder->select("imageRef_inscription, bandeSon_inscription, video_inscription")
            ->where('id_user', $session->get("id"))
            ->get()
            ->getResult();
        return $result;
    }
}