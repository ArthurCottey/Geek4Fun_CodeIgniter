
<!-- banner section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">Qui Sommes-Nous</h1>
</div>
<!-- banner section end -->
</div>

<body>`
<!-- Qui sommes-nous section start -->
<h1 class="services_taital">Le festival Geek4Fun </h1>
<div class="Nous_section layout_padding">
    <div class="container-fluid">
        <h4 class="Nous_titre">Le salon aura lieu du Vendredi 28 Octobre 2022 jusqu'au Dimanche 30 Octobre 2022 au parc Expo de tours. </h4>
        <div class="Nous_taital_main">
            <p class="Nous_text">
                Notre festival souhaite valoriser les usages pédagogiques des jeux vidéo, du
                numérique, faire découvrir les différentes écoles ainsi que les métiers du secteur.<br>
                Ce festival a aussi comme autre but de faire découvrir les différentes écoles ainsi que les métiers du secteur.
                <br>Cet événement fédérateur qui réunira les jeunes, les familles, les passionnés et les curieux
                autour du premier loisir des français affirme la volonté d'impulser une nouvelle dynamique
                territoriale.
            </p>
            <div class="row Nous-row">
                <div class="col-6">
                    <?php
                    $proprieteImage = ['src' => 'public/images/Accueil/salon.jpg',
                        'alt' =>"Image zone de jeu du festival",
                        'id'=>"Nous_img"];
                    echo img($proprieteImage);
                    ?>
                </div>
                <div class="col-6">
                    <?php
                    $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/salon-bis.jpg',
                        'alt' =>"Image zone informatique du festival",
                        'id'=>'Nous_img_bis'];
                    echo img($proprieteImage);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">

    <h2 class="text align-content-center"> Cet événement se déroulera sur plus de 4 000m2 et les visiteurs pourront
        retrouver plusieurs coins :
    </h2>

    <div class="row">
        <div class="col">
            <p>- Salon du jeu vidéo avec des tournois</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/Jeu_idéo_concours.jpg',
                'alt' =>"jeu vidéo"];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col">
            <p>- Concours cosplay</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/cosplay.jpg',
                'alt' =>"Festival",
                'style'=>"height:70%"];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col">
            <p>- Programmation/codage jeux vidéo</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/Atelier-prog.jpg',
                'alt' =>"Festival",
                'style'=>"height:70%"];
            echo img($proprieteImage);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <p>- Simulation (Vol – Conduite – Sports – Réalité Virtuelle)</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/Simulateur.jpg',
                'alt' =>"Festival",
                'style'=>"height:70%"];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col">
            <p>- Sensibilisation (Prévention web – Cyber harcèlement – Addiction)</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/Cyberharcelement.png',
                'alt' =>"Cyberharcelement",
                'style'=>"height:70%"];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col">
            <p>- Robotique, objets connectés, impression 3D</p>
            <?php
            $proprieteImage = ['src' => 'public/images/Qui-Sommes-Nous/Robotique.png',
                'alt' =>"Robotique",
                'id' =>"img_Robotique",
                'style'=>"height:70%"];
            echo img($proprieteImage);
            ?>
        </div>
    </div>
</div>
<!-- Qui sommes-nous section end -->
</div>

</body>