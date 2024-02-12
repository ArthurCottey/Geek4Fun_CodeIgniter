<?php

namespace App\Models;
use CodeIgniter\Model;
class m_groupe extends Model
{
    //Regarde si le nom saisie par le créateur du groupe existe déjà dans la base de données.
    //Retourne false si ce n'est pas le cas, sinon, retourne true.
    public function verifGroupe($nomGroupe)
    {
        $return = true;
        $db = \Config\Database::connect();
        $builder = $db->table('groupe');
        $querry = $builder->select('nom_groupe')->where('nom_groupe', $nomGroupe)->get();
        $result = $querry->getResult();
        if(empty($result))
        {
            $return = false;
        }
        return $return;
    }

    //Ajoute le groupe dans la base de données
    public function insertGroupe($nomGroupe)
    {
        $session = \Config\Services::session();
        //Tableau contenant le nom du groupe et le code pour le rejoindre
        $data = [
            'nom_groupe' => $nomGroupe,
            'mdp_groupe' => $this->generationMDP()
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('groupe');
        //Création de l'occurrence dans la table groupe
        $builder->insert($data);
        //Le créateur du groupe rejoint automatiquement le groupe créé
        $querry = $builder->select('id_groupe')->where('nom_groupe', $nomGroupe)->get();
        $result = $querry->getResult();
        $builder = $db->table('appartenir');
        //Tableau contenant l'id de l'utilisateur et l'id du groupe
        $IDs = [
            'user_id' => session()->get("id"),
            'id_groupe' => $result[0]->id_groupe
        ];
        //Création de l'occurrence dans la table appartenir
        $builder->insert($IDs);
        $session->set('idGroupe', $result[0]->id_groupe);
    }

    //Génère le code d'entrée des groupes
    private function generationMDP()
    {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        $mdp = '';
        for ($i = 0; $i < 12; $i++) {
            $mdp .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $mdp;
    }

    //Si le nom et le mdp du groupe sont correctes, l'utilisateur rejoint le groupe
    public function rejoindreGroupe($nomGroupe, $mdpGroupe)
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $retour = true;
        $builder = $db->table('groupe');
        //Retourne l'id du groupe
        $querry = $builder->select('id_groupe')->where('nom_groupe', $nomGroupe)->where('mdp_groupe', $mdpGroupe)->get();
        $result = $querry->getResult();
        //Si le nom du groupe et le mot de passes sont corrects
        if($result)
        {
            //Tableau contenant l'id de l'utilisateur et l'id du groupe
            $IDs = [
                'user_id' => session()->get("id"),
                'id_groupe' => $result[0]->id_groupe
            ];
            $builder = $db->table('appartenir');
            $builder->insert($IDs);
            //Ajoute l'id du groupe à la variable de session
            $session->set('idGroupe', $result[0]->id_groupe);
        }
        //Si le nom du groupe ou le mot de passe est faux
        else
        {
            $retour = false;
        }
        return $retour;
    }

    //Si l'utilisateur qui vient de se connecter est dans un groupe, retourne l'id du groupe
    public function verifGroupeConnexionUser($idUser)
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $builder = $db->table('appartenir');
        $querry = $builder->select('id_groupe')->where('user_id', $idUser)->get();
        $result = $querry->getResult();
        return $result;
    }

    //Renvoie les informations du groupe de l'utilisateur connecté
    public function infosGroupe()
    {
        //On récupère l'id du groupe de l'utilisateur
        $session = \Config\Services::session();
        $idGroupe = $session->get('idGroupe');
        //Connexion à la base de données
        $db = \Config\Database::connect();
        //Renvoie le nom et le mot de passe du groupe + la liste des utilisateurs appartenant à ce groupe.
        $builder = $db->table('groupe G');
        $query = $builder->select('G.nom_groupe, G.mdp_groupe, U.pseudo_user')
            ->join('appartenir A', 'G.id_groupe = A.id_groupe')
            ->join('user U', 'A.user_id = U.id_user')
            ->where('A.id_groupe', $session->get("idGroupe"))
            ->get();
        return $query->getResult();
    }

    //Supprime l'occurrence dans la table appartenir
    public function quitterGroupe()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $builder = $db->table('appartenir');
        $builder->where('user_id', $session->get('id'))
            //->where('id_groupe', $session->get('id_groupe'))
            ->delete();
        $session->remove('idGroupe');
    }
}