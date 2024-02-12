<?php

namespace App\Controllers;
use App\Models\m_groupe;
use App\Models\m_user;
use App\Models\m_cosplay;
use CodeIgniter\Config\Services;

class c_user extends BaseController
{
    public function identificationUser()
    {
        $validation = Services::validation();
        $session = \Config\Services::session();
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $errors = [
            'email' => ['required' => 'Veuillez remplir ce champ'],
            'password' => ['required' => 'Veuillez remplir ce champ']
        ];
        $validation->setRules($rules, $errors);
        //Les règles de validation sont respectées
        if($this->validate($rules, $errors))
        {
            $InfosUser = array();
            array_push($InfosUser, $this->request->getPost('email'), $this->request->getPost('password'));
            $model = new m_user();
            $verification = $model->verifUser($InfosUser);
            //Login et/ou mot de passe incorrect
            if($verification == false)
            {
                $errorInfos['validation'] = $this->validator;
                return view('Commun/v_header')
                    .view('ConnexionInscription/v_erreurConnexion')
                    .view('ConnexionInscription/v_connexion', $errorInfos)
                    .view('Commun/v_footer');
            }
            //Login et mot de passe corrects, connexion au compte utilisateur
            else
            {
                //Création d'une nouvelle instance
                $modelGroupe = new m_groupe();
                $groupeUser = $modelGroupe->verifGroupeConnexionUser($verification["id"]);
                $modelConcours = new m_cosplay();
                $session->set('login', $verification["login"]);
                $session->set('id', $verification["id"]);
                $session->set('habilitation', $verification["habilitation"]);
                $session->set('age', $verification["age"]);
                //Si l'utilisateur appartient à un groupe, ajoute aux variables de session l'id du groupe
                if($groupeUser)
                {
                    $session->set('idGroupe', $groupeUser[0]->id_groupe);
                }
                $concoursUser = $modelConcours->verifConcoursCosplay();
                if ($concoursUser)
                {
                    $session->set("idConcours", $concoursUser[0]->id_concours);
                }
                return view('Commun/v_header')
                    .view('Accueil/v_accueil')
                    .view('Commun/v_footer');
            }
        }
        //Les règles de validations ne sont pas respectées
        else
        {
            $errorInfos['validation'] = $this->validator;
            return view('Commun/v_header')
                .view('ConnexionInscription/v_connexion', $errorInfos)
                .view('Commun/v_footer');
        }

    }

    //Efface les données de la session avant de la fermer
    public function deconnexion()
    {
        $session = \Config\Services::session();
        $session->remove('login');
        $session->remove('id');
        if($session->get('idGroupe'))
        {
            $session->remove('idGroupe');
        }
        if($session->get('idConcours'))
        {
            $session->remove('idConcours');
        }
        $session->remove('habilitation');
        $session->remove('age');
        $session->destroy();
        return view('Commun/v_header')
            .view('Accueil/v_accueil')
            .view('Commun/v_footer');
    }

    //Regarde si un user existe déjà avec le pseudonyme et l'email inscrit.
    //Si c'est le cas, redirige sur la page d'inscription, sinon, affiche le fourmulaire à compléter
    public function ajoutUser()
    {
        $validation = Services::validation();
        $session = \Config\Services::session();
        $rules = [
            'login' => 'required',
            'email' => 'required',
            //'password' => 'required|min_length[12]|regex_match[/^[][a-zA-Z0-9@# ,().]+$/]'
        ];
        $errors = [
            'login' => ['required' => 'Veuillez remplir ce champ'],
            'email' => ['required' => 'Veuillez remplir ce champ'],
            /*'password' => ['required' => 'Veuillez remplir ce champ',
                'min_lenght' => 'Votre mot de passe doit contenir au moins 12 caractères',
                'regex_match' => 'Votre mot de passe doit contenir : maj, min; nombre et caractère spécial']*/
        ];
        $validation->setRules($rules, $errors);
        //Si les saisies de l'utilisateur respectent toutes les règles
        if($this->validate($rules, $errors))
        {
            $verifInfos = array();
            array_push($verifInfos, $this->request->getPost('login'), $this->request->getPost('email'));
            $model = new m_user();
            $verification = $model->userExist($verifInfos);
            //Si aucun compte utilise le login ou l'adresse email saisie
            if($verification === false)
            {
                $Infos['validation'] = $this->validator;
                $Infos['userExist'] = false;
                $Infos['infosUser'] = $verifInfos;
                return view('Commun/v_header')
                    .view('ConnexionInscription/v_inscription', $Infos)
                    .view('Commun/v_footer');
            }
            //Si un compte utilise déjà le login et/ou l'adresse email
            else
            {
                $errorInfos['validation'] = $this->validator;
                return view('Commun/v_header')
                    .view('ConnexionInscription/v_erreurCreationCompte')
                    .view('ConnexionInscription/v_inscription', $errorInfos)
                    .view('Commun/v_footer');
            }
        }
        //Si les saisies de l'utilisateur ne respectent pas toutes les règles
        else
        {
            $errorInfos['validation'] = $this->validator;
            return view('Commun/v_header')
                .view('ConnexionInscription/v_inscription', $errorInfos)
                .view('Commun/v_footer');
        }
    }

    //Ajoute une nouvelle occurrence dans la table "user"
    public function ajoutBdd()
    {
        $model = new m_user();
        $model->insertUser($_POST['pseudo'], $_POST['mail'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'],
            $_POST['telephone'], $_POST['dateNaiss'], $_POST['adresse'], $_POST['ville'], $_POST['codePostal']);
        return view('Commun/v_header')
            .view('ConnexionInscription/v_inscriptionOk')
            .view('Accueil/v_accueil')
            .view('Commun/v_footer');
    }

}