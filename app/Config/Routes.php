<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('c_accueil');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 //$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'c_accueil::index');
$routes->add('/politique-festival', 'c_accueil::politique_festival');
$routes->add('/connexion', 'c_accueil::connexion');
$routes->add('/deconnexion', 'c_user::deconnexion');
$routes->add('/cosplay', 'c_accueil::cosplay');
$routes->add('/identificationUser', 'c_user::identificationUser');
$routes->add('/ajoutUser', 'c_user::ajoutUser');
$routes->add('/ajoutBdd', 'c_user::ajoutBdd');
$routes->add('/ConcoursCosplay', 'c_accueil::ConcoursCosplay');
$routes->add('/Qui-Sommes-Nous', 'c_accueil::Presentation');

//Routes des groupes
$routes->add('/groupe', 'c_groupe::pageCreerGroupe');
$routes->add('/verifGroupe', 'c_groupe::creerGroupe');
$routes->add('/rejoindreGroupe', 'c_groupe::rejoindreGroupe');
$routes->add('/pageGestionGroupe', 'c_groupe::infosGroupe');
$routes->add('/quitterGroupe', 'c_groupe::quitterGroupe');

//Admin
$routes->add('/admin', 'c_admin::pageAdmin');
$routes->add('/supprimerConcours', 'c_admin::supprimerConcours');
//A supprimer si on passe par des pop-ups
$routes->add('/CreationGroupe', 'c_admin::pageCreerConcours');
$routes->add('/ajoutConcours', 'c_admin::ajoutConcours');

//Concours
$routes->add('/nbPlaceDisponible', 'c_cosplay::nbPlaceRestantConcours');
$routes->add('/inscriptionConcours', 'c_cosplay::listeCoucoursCosplay');
$routes->add('/choixUserConcours', 'c_cosplay::inscriptionConcours');
$routes->add('/desinscriptionConcours', 'c_cosplay::desinscriptionConcours');
$routes->add('/annuleInscription', 'c_cosplay::supprOcurrenceConcours');
$routes->add('/UploadImagesInscription', 'c_cosplay::uploadImagesInscription');
$routes->add('/modificationConcours', 'c_cosplay::modificationConcours');


$routes->add('/form', 'c_accueil::form');

$routes->add('/test', 'c_accueil::test');


//A supprimer avant de rendre le projet
//$routes->add('/form', 'c_accueil::form');
//$routes->get('/identificationUser', 'c_accueil::cosplay');
//$routes->match(['get', 'post'], 'identificationUser', 'c_user::connexion');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
