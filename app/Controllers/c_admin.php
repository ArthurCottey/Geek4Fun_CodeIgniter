<?php

namespace App\Controllers;
use App\Models\m_admin;
use App\Models\m_cosplay;

class c_admin extends BaseController
{
    public function pageAdmin()
    {
        $model = new m_cosplay();
        $listeConcours = $model->getConcours();
        return view('Commun/v_header')
            .view('Admin/v_admin', ['listeConcours' => $listeConcours]);
    }

    public function pageCreerConcours()
    {
        return view('Commun/v_header')
            .view('Admin/v_creerConcours')
            .view('Commun/v_footer');
    }

    public function ajoutConcours()
    {
        //Si l'administrateur à uploadé une image pour la page d'inscription aux concours
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
        {
            //On renomme l'image
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $nouvNom = uniqid().'.'.$extension;
            $dossierImage = FCPATH . "images/ImagesConcours/ImagesPageInscription/";

            //On enregistre l'image dans 'public/images/ImagesConcours/ImagesReferences'
            $cheminImage = $dossierImage . $nouvNom;
            move_uploaded_file($_FILES['image']['tmp_name'], $cheminImage);

            //Chemin relatif qui sera stocké dans la table "concours"
            $cheminImage = base_url()."/public/images/ImagesConcours/ImagesPageInscription/".$nouvNom;
        }
        else
        {
            //Chemin de l'image par défaut
            $cheminImage = base_url()."/public/images/ImagesConcours/ImagesPageInscription/ImageDefaut.png";
        }
        //On instancie la classe m_admin()
        $model = new m_admin();
        //On appelle la méthode ajoutConcours
        $model->ajoutConcours($_POST['date'], $_POST['theme'], $_POST['categAge'], $_POST['groupe'], $_POST['nbPlace'], $cheminImage);
        //Redirige l'utilisateur vers l'url "public/admin" pour appeler la fonction "pageAdmin()"
        return redirect()->to(base_url('public/admin'));
    }

    public function supprimerConcours()
    {
        $id = $_POST['id'];
        $imgDefaut = intval($_POST['lienImg']);
        if ($imgDefaut === 0)
        {
            $model = new m_cosplay();
            $lienImage = $model->getImagePageInscription($id);
            //enlève "http://localhost/Geek4Fun_CodeIgniter/public" pour ne garder que le chemin relatif
            $lienRelatif = substr($lienImage[0]->imagePageInscription_concours, 45);
            unlink(realpath($lienRelatif));
        }
        $model = new m_admin();
        $model->supprimerConcours($id);

    }

}