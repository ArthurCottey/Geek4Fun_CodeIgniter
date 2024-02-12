<?php

namespace App\Controllers;
use App\Models\m_jeu;
use CodeIgniter\Config\Services;

class c_accueil extends BaseController
{

    //Page d'accueil du site
    public function index()
    {
        return view('Commun/v_header')
            .view('Accueil/v_accueil')
            .view('Commun/v_footer');
    }

    //Page politique-festival
    public function politique_festival()
    {
        return view('Commun/v_header')
            .view('Accueil/v_politique_festival')
            .view('Commun/v_footer');
    }


    //Page d'accueil du site
    public function Presentation()
    {
        return view('Commun/v_header')
            .view('Qui-Sommes-Nous/Qui-Sommes-Nous')
            .view('Commun/v_footer');
    }

    //Page de connexion
    public function connexion()
    {
        $data['validation'] = Services::validation();
        return view('Commun/v_header')
        .view('ConnexionInscription/v_connexion', $data)
        .view('Commun/v_footer');
    }

    //Page cosplay
    public function cosplay()
    {
        return view('Commun/v_header')
            .view('Cosplay/v_cosplay')
            .view('Commun/v_footer');
    }

    //Page concours
    public function ConcoursCosplay()
    {
        return view('Commun/v_header')
            .view('Concours/v_concours')
            .view('Commun/v_footer');
    }

    // à supprimer avant de rendre le projet
    public function form()
    {
        return view('ConnexionInscription/v_inscription');
    }

    public function test()
    {
        return view('Commun/v_header')
            .view('essaie')
            .view('Commun/v_footer');
    }

}