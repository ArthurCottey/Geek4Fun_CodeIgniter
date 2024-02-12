<body>
<!-- banner section start -->
<div class="banner_section layout_padding">

    <div class="container"><br>
        <h1 class="banner_taital">GEEK4FUN</h1>
    </div>

</div>
<!-- banner section end -->
</div>
<!-- header section end -->

<!-- Qui sommes-nous section start -->
<div class="about_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="about_taital_main">
                    <h1 class="about_taital">Qui Sommes Nous</h1>
                    <p class="about_text">
                        La première édition du festival du jeu vidéo et du numérique les 27, 28 et 29 Mai 2023.
                        Au programme : ateliers participatifs, conférences, free play, tournois mais aussi job et stage
                        dating. Ce festival sera surtout l'occasion de rencontrer de professionnels du jeu vidéo et du
                        numérique issus du département mais aussi du national.
                    <div class="readmore_bt"><a href="<?php echo base_url('public/Qui-Sommes-Nous');?>">Lire plus</a></div>
                </div>
            </div>
            <div class="col-md-6 padding_right_0">
                <div><?php
                    $proprieteImage = ['src' => 'public/images/Accueil/salon.jpg',
                        'alt' =>"Festival",
                        'class'=>'about_img'];
                    echo img($proprieteImage);
                    ?></div>
            </div>
        </div>
    </div>
</div>
<!-- Qui sommes-nous section end -->

<!-- activité section start -->
<h1 class="services_taital">Les activités proposées au sein du festival </h1>
<div class="services_section layout_padding">
    <div class="container"><br>

        <div class="services_section_1">

            <div class="row">
                <div class="col-md-4">
                    <div>
                        <?php
                        $proprieteImage = ['src' => 'public/images/Accueil/Tournois.png',
                            'alt' =>"Logo Geek4Fun",
                            'class'=>'services_img'];
                        echo img($proprieteImage);
                        ?></div>
                    <div class="btn_main"><a href="#">Tournois</a></div>
                </div>
                <div class="col-md-4">
                    <div>                        <?php
                        $proprieteImage = ['src' => 'public/images/Accueil/cosplay.jpg',
                            'alt' =>"Logo Geek4Fun",
                            'class'=>'services_img'];
                        echo img($proprieteImage);
                        ?></div>
                    <div class="btn_main"><a href="<?php echo base_url('public/cosplay');?>">Cosplay</a></div>
                </div>
                <div class="col-md-4">
                    <div>                        <?php
                        $proprieteImage = ['src' => 'public/images/Accueil/cyber.jpg',
                            'alt' =>"Logo Geek4Fun",
                            'class'=>'services_img'];
                        echo img($proprieteImage);
                        ?></div>
                    <div class="btn_main"><a href="#">Cybersécurité</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activité section end -->

<!-- jeu tournois section start -->
<h1 class="services_taital">Les jeux à tester </h1>
<div class="jeu_section layout_padding">
    <div class="container">
        <div class="jeu_section_2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row row-carousel row-cols-3">
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/fifa.jpg',
                                                    'alt' =>"FIFA",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">FIFA 22</p>
                                            <p>FIFA 22 est un jeu vidéo de simulation de football publié par Electronics Arts.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/nba23.jpg',
                                                    'alt' =>"NBA2K23",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">NBA2K23</p>
                                            <p>NBA 2K23 est un jeu vidéo de basket-ball publié par 2K Sports, basé sur la National Basketball Association.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/rocket-league.jpg',
                                                    'alt' =>"Rocket League",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:80%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Rocket League</p>
                                            <p>Rocket League un mélange étonnant de football d'arcade et de chaos motorisé !</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil  ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/street-fighter.jpg',
                                                    'alt' =>"Street Fighter",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:80%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Street Fighter</p>
                                            <p>Street Fighter est une série de jeux vidéo de combat en un contre un développée par Capcom</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-carousel row-cols-4">
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/justdance.jpg',
                                                    'alt' =>"JustDance",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">JustDance</p>
                                            <p>Just Dance 2023 Edition est un jeu de rythme et de danse développé par Ubisoft Paris et édité par Ubisoft</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/league-of-legends.jpg',
                                                    'alt' =>"League of Legends",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:80%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">League of Legends</p>
                                            <p>League of Legends est un jeu vidéo sorti en 2009 de type arène de bataille en ligne, free-to-play, développé et édité par Riot Games</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/overwatch2.jpg',
                                                    'alt' =>"Overwatch 2",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:80%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Overwatch 2</p>
                                            <p>Overwatch 2 est un jeu vidéo de tir en vue subjective multijoueur développé et édité par Blizzard Entertainment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/Super-Smach.jpg',
                                                    'alt' =>"Super Smach Bros",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Super Smach Bros</p>
                                            <p>Super Smash Bros. est une série de jeux vidéo de combat et de plates-formes éditée par Nintendo </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-carousel row-cols-4">
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/pokemon-scarlet.jpg',
                                                    'alt' =>"Street Fighter",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Pokemon Scarlet</p>
                                            <p>Pokémon Pokémon Scarlet est jeux vidéo de rôle de la franchise Pokémon développés par Game Freak</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/pokemon-violet.jpg',
                                                    'alt' =>"pokemon-violet",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Pokemon Violet</p>
                                            <p>Pokémon Pokémon Violet est jeux vidéo de rôle de la franchise Pokémon développés par Game Freak</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/iRacing.jpg',
                                                    'alt' =>"iRacing",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:80%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">iRacing</p>
                                            <p>iRacing est un jeu vidéo de course développé et édité par iRacing.com Motorsport Simulations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jeu-accueil ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?php
                                                $proprieteImage = ['src' => 'public/images/Tournois/spiderman.png',
                                                    'alt' =>"Spider-Man",
                                                    'class'=>"jeu_img",
                                                    'style'=>"width:90%"];
                                                echo img($proprieteImage);
                                                ?></p>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="title">Spider-Man</p>
                                            <p>Marvel's Spider-Man est une série de jeux vidéo d'action-aventure développés par Insomniac Games</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- jeu tournois section end -->
</body>


<div class="text-white">|</div><!-- problème de div à garder mais à changer et manque la partie cosplay -->

