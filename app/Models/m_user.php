<?php

namespace App\Models;
use CodeIgniter\Model;
use DateTime;

class m_user extends Model
{
    //Regarde si un utilisateur existe avec le mail et le mot de passe inscrit
    //Si oui, retourne les infos du user
    public function verifUser($InfosUser)
    {
        $retour = false;
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $querry = $builder->select('mdp_user, pseudo_user, id_user, habilitation_user, dateNaissance_user')
            ->where('mail_user', $InfosUser[0])->get();
        $result = $querry->getResult();
        if(isset($result[0]->mdp_user))
        {
            if(password_verify($InfosUser[1], $result[0]->mdp_user))
            {
                $retour = [
                    "login" => $result[0]->pseudo_user,
                    "id" => $result[0]->id_user,
                    "habilitation" => $result[0]->habilitation_user,
                    "age" => $this->calculAgeUser($result[0]->dateNaissance_user)
                ];
            }
        }
        return $retour;
    }

    //Renvoie "false" si aucun utilisateur utilise le login ou l'adresse mail saisie. Sinon, renvoie "true"
    public function userExist($verifInfos)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->Where('pseudo_user' ,$verifInfos[0]);
        $builder->orWhere('mail_user', $verifInfos[1]);
        $results = $builder->get()->getResult();
        if(empty($results))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //Requête qui insert une nouvelle occurrence dans la table "user" avec les informations saisie par l'utilisateur
    public function insertUser($pseudo, $mail, $mdp, $nom, $prenom, $telephone, $dateNaiss, $adresse, $ville, $codePostal)
    {
        //Tableau contenant les informations du user
        $data = [
            'prenom_user' => strtoupper($prenom),
            'nom_user' => strtoupper($nom),
            'pseudo_user' => $pseudo,
            'mdp_user' => password_hash($mdp, PASSWORD_BCRYPT),
            'habilitation_user' => 1,
            'dateNaissance_user' => $dateNaiss,
            'adresse_user' => $adresse,
            'codePostal_user' => $codePostal,
            'ville_user' => $ville,
            'telephone_user' => $telephone,
            'mail_user' => $mail
        ];
        $db = \Config\Database::connect();
        $db->table('user')->insert($data);
    }

    //Calcul l'âge de l'utilisateur en fonction de sa date de naissance
    private function calculAgeUser($dateNaiss_user)
    {
        // Convertir la date de naissance en objet de type DateTime
        $dateNaiss = new DateTime($dateNaiss_user);

        // Obtenir la date et l'heure courantes
        $dateCourante = new DateTime();

        // Calculer la différence entre les deux dates
        $age = $dateCourante->diff($dateNaiss);

        // Retourner l'âge en années
        return $age->y;
    }

}