<?php

namespace App\Controllers;
Use App\Models\m_groupe;
class c_groupe extends BaseController
{


    //Création d'un groupe
    public function pageCreerGroupe()
    {
        return view('Commun/v_header')
            .view('Groupe/v_groupe')
            .view('Commun/v_footer');
    }

    //Génère une requête pour voir si le nom de groupe saisie par l'utilisateur existe déjà dans la base de données.
    public function creerGroupe()
    {
        $model = new m_groupe();
        $nomDejaExistant = $model->verifGroupe($_POST['nomGroupe']);
        //Si le nom du groupe existe déjà
        if($nomDejaExistant === true)
        {
            //Renvoie l'utilisateur sur la page "creerGroupe"
            return view('Commun/v_header')
                .view('Groupe/v_erreur_groupe')
                .view('Groupe/v_groupe')
                .view('Commun/v_footer');
        }
        //Si le nom du groupe n'existe pas
        else
        {
            //Créé une occurrence dans la table groupe
            $model->insertGroupe($_POST['nomGroupe']);
            return view('Commun/v_header')
                .view('Groupe/v_creationGroupeOk')
                .view('Accueil/v_accueil')
                .view('Commun/v_footer');
        }
    }

    //L'utilisateur rejoint le groupe si le nom du groupe et le mot de passe sont corrects
    public function rejoindreGroupe()
    {
        $model = new m_groupe();
        $groupeRejoint = $model->rejoindreGroupe($_POST['nomGroupe'], $_POST['mdpGroupe']);
        //Renvoie sur la page d'accueil si l'exécution n'a pas eu de problème
        if ($groupeRejoint)
        {
            return view('Commun/v_header')
                .view('Groupe/v_rejoindreGroupeOk')
                .view('Accueil/v_accueil')
                .view('Commun/v_footer');
        }
        //Renvoie l'utilisateur sur la page "rejoindreGroupe" si le nom du groupe ou le mot de passe est faux
        else
        {
            return view('Commun/v_header')
                .view('Groupe/v_erreur_ajout_groupe')
                .view('Groupe/v_groupe')
                .view('Commun/v_footer');
        }
    }

    public function infosGroupe()
    {
        $model = new m_groupe();
        $infosGroupe = $model->infosGroupe();
        return view('Commun/v_header')
            .view('Groupe/v_monGroupe', ['infosGroupe' => $infosGroupe])
            .view('Commun/v_footer');
    }

    //L'utilisateur quitte le groupe auquel il appartient
    public function quitterGroupe()
    {
        $model = new m_groupe();
        $model->quitterGroupe();
        return view('Commun/v_header')
            .view('Groupe/v_quitterGroupe')
            .view('Accueil/v_accueil')
            .view('Commun/v_footer');
    }
}