<?php


//$userData = $session->get();
?>

<!DOCTYPE html>
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Festival Geek4Fun</title>
    <meta name="keywords" content="Festival Tournois Concours Cosplay ">
    <meta name="description" content="">
    <meta name="author" content="Team4Web">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Font-Awesome -->
    <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- fevicon -->
    <link rel="icon" href="/public/images/Logos/G4F_ter.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<!-- header section start -->
<div class="header_section">
    <div class="header_main">
        <div class="mobile_menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo_mobile"><a href="<?php echo base_url('public/');?>"><?php
                        $proprieteImage = ['src' => '/public/images/Logos/G4F_ter.png',
                            'alt' =>"Logo Geek4Fun",
                            'class'=>'nav-img',
                            'style' => 'width:5%'];
                        echo img($proprieteImage);
                        ?></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('public/');?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('public/Qui-Sommes-Nous');?>">Qui Sommes Nous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('public/cosplay');?>">Cosplay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html" class="btn-tournois">Tournois</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contact.html">Cybersécurité</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('public/Connexion');?>">Connexion / Inscription</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="logo"><a href="<?php echo base_url('public/');?>"><?php
                    $proprieteImage = ['src' => '/public/images/Logos/G4F_ter.png',
                        'alt' =>"Logo Geek4Fun",
                        'class'=>'nav-img',
                        'style' => 'width:5%'];
                    echo img($proprieteImage);
                    ?></a></div>
            <?php
            $loginUser = session()->get('login');
            $habilitUser = session()->get('habilitation');
            ?>
            <div class="menu_main">
                <ul>
                    <li class="active"><a href="<?php echo base_url('public/');?>">Accueil</a></li>
                    <li><a href="<?php echo base_url('public/Qui-Sommes-Nous');?>">Qui Sommes Nous</a></li>
                    <li><div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" id="dropdownMenuCosplay" data-toggle="dropdown" style="
    margin: -6px 0px 0px 0px;
">Cosplay</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuCosplay">
                                <input class="dropdown-item" type="submit"
                                       onclick="window.location.href = '<?php echo base_url('/public/cosplay');?>';" value="Règlement" />

                                <input class="dropdown-item" type="submit"
                                       onclick="window.open('<?php echo base_url('public/documents/Cosplay_DerogationMineurs.pdf');?>', '_blank');" value="Autorisation parentale" />


                                <input class="dropdown-item" type="submit"
                                       onclick="window.location.href = '<?php echo base_url('/public/inscriptionConcours');?>'" value="Concours" />



                            </div>
                        </div></a></li>

                    <li><a href="">Tournois</a></li>
                    <li><a href="">Cybersécurité</a></li>
                    <?php
                    //Affiche le bouton "Admistration" si l'utilisateur connecté est un administrateur
                    if ($habilitUser === "0")
                    {
                        ?>
                        <li><a href="<?php echo base_url('public/admin');?>">Administration</a></li>
                        <?php
                    }
                    if (!$loginUser)
                    {
                        ?>
                        <li><a href="<?php echo base_url('public/connexion');?>">Connexion / Inscription</a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <?php
                        $groupeUser = session()->get('idGroupe');
                        ?>


                        <li><div class="dropdown">
                                <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="
    margin: -6px 0px 0px 0px;
"><?= $loginUser ?></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

<?php
                                    //Si l'utilisateur n'appartient à aucun groupe
                                    if(!$groupeUser)
                                    {
                                        echo form_open(base_url() . "/public/groupe");?>
                                        <input class="dropdown-item" type="submit" value="Groupe"/>
                                        <?php echo form_close();
                                    }
//Si l'utilisateur appatient à un groupe
                                    else
                                    {
                                        echo form_open(base_url() . "/public/pageGestionGroupe");?>
                                        <input class="dropdown-item" type="submit" value="Voir mon groupe"/>
                                        <?php echo form_close();
                                    }
                                    $session = \Config\Services::session();
                                    if ($session->get("idConcours"))
                                    {
                                    echo form_open(base_url() . "/public/desinscriptionConcours");?>
                                    <input class="dropdown-item" type="submit" value="Se désincrire du concours"/>
                                    <?php echo form_close();
                                    }



                                    echo form_open(base_url() . "/public/deconnexion");
                                    ?>
                                    <input class="dropdown-item" type="submit" value="Se déconnecter"/>
                                    <?php echo form_close();
                                    ?>


                                </div>
                            </div></a></li>
                        <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>



    <!-- header section end -->

