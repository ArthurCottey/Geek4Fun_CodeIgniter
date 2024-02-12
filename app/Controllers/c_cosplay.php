<?php

namespace App\Controllers;
use App\Models\m_cosplay;
class c_cosplay extends BaseController
{
    public function listeCoucoursCosplay()
    {
        $model = new m_cosplay();
        $listeConcours = $model->getConcours();
        return view('Commun/v_header')
            .view('Cosplay/v_inscriptionCosplay', ['listeConcours' => $listeConcours])
            .view('Commun/v_footer');
    }

    //Renvoie le nombre de place restant pour le concours sélectionné
    public function nbPlaceRestantConcours()
    {
        $model = new m_cosplay();
        //On récupère le paramètre de la requête ajax
        $id = $_POST["id"];
        $nbPlaceDispo = $model->checkNbPlaceDispo($id);

        //return $nbPlaceDispo;
        //Renvoie le résultat de la requête à AJAX en format JSON
        echo json_encode($nbPlaceDispo);
    }

    //Inscrit l'utilisateur au concours souhaité
    public function inscriptionConcours()
    {
        $id = $_POST["id"];
        $session = \Config\Services::session();
        $userConnect = $session->get("id");
        $model = new m_cosplay();
        //Si un utilisateur est connecté
        if(isset($userConnect))
        {
            $concoursUser = $model->verifConcoursCosplay();
            //Si l'utilisateur est déjà inscrit à un concours, remplace l'ancien par le nouveau
            if ($session->get("idConcours") !== null)
            {
                //Supprime les files de l'ancien concours
                $filesUser = $model->getFilesInscription();
                $lienRelatifImg = substr($filesUser[0]->imageRef_inscription, 45);
                unlink(realpath($lienRelatifImg));
                if ($filesUser[0]->bandeSon_inscription != null)
                {
                    $lienRelatifSon = substr($filesUser[0]->bandeSon_inscription, 45);
                    unlink(realpath($lienRelatifSon));
                }
                if ($filesUser[0]->video_inscription != null)
                {
                    $lienRelatifVideo = substr($filesUser[0]->video_inscription, 45);
                    unlink(realpath($lienRelatifVideo));
                }

                $model->supprInscriptionUserBdd();
                //$this->desinscriptionConcours();
                $model->inscriptionUserBdd($id);
            }
            else
            {
                $model->inscriptionUserBdd($id);
            }
        }

    }


    //Désinscrit l'utilisateur de son concours
    public function desinscriptionConcours()
    {
        $model = new m_cosplay();
        //Supprime les files de l'ancien concours
        $filesUser = $model->getFilesInscription();

        $lienRelatifImg = substr($filesUser[0]->imageRef_inscription, 45);
        unlink(realpath($lienRelatifImg));

        if ($filesUser[0]->bandeSon_inscription != null)
        {
            $lienRelatifSon = substr($filesUser[0]->bandeSon_inscription, 45);
            unlink(realpath($lienRelatifSon));
        }

        if ($filesUser[0]->video_inscription != null)
        {
            $lienRelatifVideo = substr($filesUser[0]->video_inscription, 45);
            unlink(realpath($lienRelatifVideo));
        }

        $this->supprOcurrenceConcours();
        return redirect()->to(base_url().'/public/inscriptionConcours');
    }

    public function supprOcurrenceConcours()
    {
        $model = new m_cosplay();
        $model->supprInscriptionUserBdd();
        $session = \Config\Services::session();
        $session->remove('idConcours');
        //Redirection vers la page d'inscription aux concours
        return redirect()->to(base_url().'/public/inscriptionConcours');
    }

    //Traitement des files uploadés par l'utilisateur
    public function uploadImagesInscription()
    {
        $session = \Config\Services::session();

        $userConnect = $session->get("id");
        //Si un utilisateur est connecté
        if(isset($userConnect))
        {
            //Initialisation des variables des files facultatifs avec la valeur null
            $cheminMusique = null;
            $cheminVideo = null;

            //Traitement de l'image
            //On renomme l'image
            $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $nouvNom = $session->get("login").uniqid().'.'.$extension;
            $dossierImage = FCPATH . "images/ImagesConcours/ImagesInscriptionUsers/";

            //On enregistre l'image dans 'public/images/ImagesConcours/ImagesInscriptionUsers'
            $cheminImage = $dossierImage . $nouvNom;
            move_uploaded_file($_FILES['img']['tmp_name'], $cheminImage);

            //Chemin relatif qui sera stocké dans la table "concours"
            $cheminImage = base_url()."/public/images/ImagesConcours/ImagesInscriptionUsers/".$nouvNom;

            //Traitement de la bande son
            if(isset($_FILES['musique']) && $_FILES['musique']['error'] === UPLOAD_ERR_OK)
            {
                //On renomme le fichier
                $extension = pathinfo($_FILES['musique']['name'], PATHINFO_EXTENSION);
                $nouvNom = $session->get("login").uniqid().'.'.$extension;
                $dossierSon = FCPATH . "images/ImagesConcours/BandesSonsInscriptionUsers/";

                //On enregistre le fichier son dans 'public/images/ImagesConcours/BandesSonsInscriptionUsers'
                $cheminMusique = $dossierSon . $nouvNom;
                move_uploaded_file($_FILES['musique']['tmp_name'], $cheminMusique);

                //Chemin relatif qui sera stocké dans la table "concours"
                $cheminMusique = base_url()."/public/images/ImagesConcours/BandesSonsInscriptionUsers/".$nouvNom;
            }

            //Traitement de la video
            if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK)
            {
                //On renomme le fichier
                $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                $nouvNom = $session->get("login").uniqid().'.'.$extension;
                $dossierVideo = FCPATH . "images/ImagesConcours/VideosInscriptionUsers/";

                //On enregistre le fichier vidéo dans 'public/images/ImagesConcours/VideosInscriptionUsers'
                $cheminVideo = $dossierVideo . $nouvNom;
                move_uploaded_file($_FILES['video']['tmp_name'], $cheminVideo);

                //Chemin relatif qui sera stocké dans la table "concours"
                $cheminVideo = base_url()."/public/images/ImagesConcours/VideosInscriptionUsers/".$nouvNom;
            }
            //Modifie l'occurrence en ajoutant les chemins relatifs des files uploadés
            $model = new m_cosplay();
            $model->ajoutFilesInscription($cheminImage, $cheminMusique, $cheminVideo);
        }

        //Redirige l'utilisateur sur la page d'inscription aux concours
        return redirect()->to(base_url().'/public/inscriptionConcours');
    }

}