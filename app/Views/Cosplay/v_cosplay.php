<head>
    <?php echo link_tag('/public/css/cosplay.css');?>
</head>
<!-- banner section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">Cosplay</h1>
</div>|
<!-- banner section end -->
</div>

    <div class="row-cosplay justify-content-center">

        <div class="col-4">
            <?php
            $proprieteImage = ['src' => '/public/images/Cosplay/Page1.png',
                'alt' =>"Carte Cosplay",
                'class'=>'card-img-top'];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col-4">
            <h1>INSCRIPTION</h1>

            <ul class="text-justify">
                <li>
                    Pré-inscrire via le formulaire d'inscription est obligatoire.
                </li>
                <li>
                    Les inscriptions sont ouvertes 3 mois avant le festival et jusqu’au jour de
                    l’évènement dans la limite des places disponibles.

                </li>
                <li>
                    Chaque participant doit fournir au moins une image de référence de bonne qualité́, présentant son
                    personnage type (jpg, png) et une bande son (format .wav ou .mp3) ou une vidéo
                    (format .mp4 ou .avi)
                </li>
                <li>
                    Il est conseillé d’apporter également les fichiers sur clé́ USB le jour du concours
                    afin de palier à tout problème avec les fichiers
                </li>



            </ul>
        </div>


    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-4">
            <h1>CONCOURS</h1>
            <p>
            <ul>
                <li>
                    La validation de «inscriptions cosplay» sera avant 12h pour
                    valider son inscription. (présentation de la carte d'identité obligatoire)
                </li>
                <li>
                    Les horaires de passage sur scène seront communiqués une fois les plannings bouclés.
                </li>
                <li>
                    Une liste d’attente sera mise en place.
                    En cas de désistement, les personnes sur liste d’attente seront prévenues au
                    fur et à mesure des places disponibles.
                </li>
                <li>
                    Les costumes doivent être tirés des thèmes suivants :
                    Jeux vidéo / Dessins animés /Films ou séries / Animes / Mangas / BD / Comics
                    /Littérature
                </li>
                <li>
                    Tout costume qui ne rentre pas dans l’un de ces thèmes devra être soumis à
                    validation par l’équipe organisatrice.
                </li>
                <li>
                    Chaque participant au concours s’engage à avoir réalisé au moins 80% de son
                    costume lui-même. La découverte d’un cosplay acheté non signalé entraînera
                    la disqualification du participant concerné.
                </li>

            </ul>

            </p>
        </div>
        <div class="col-4">
            <?php
            $proprieteImage = ['src' => '/public/images/Cosplay/Page2.jpg',
                'alt' =>"Carte Cosplay",
                'class'=>'card-img-top'];
            echo img($proprieteImage);
            ?>
        </div>

    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-4">
            <?php
            $proprieteImage = ['src' => '/public/images/Cosplay/Page3.jpg',
                'alt' =>"Carte Cosplay",
                'class'=>'card-img-top'];
            echo img($proprieteImage);
            ?>
        </div>
        <div class="col-4">
            <h1>LOGES & MATÉRIEL</h1>
            <p>
            <ul>
                <li>
                    Des loges sont accessibles aux cosplayeurs participant au concours. Celles-ci
                    disposent de tables, chaises, miroir. Des bouteilles d’eau et biscuits seront mis
                    à disposition.
                </li>
                <li>
                    Du matériel de réparation (pistolet à chaleur, colle chaude, échantillons de
                    Worbla, épingles, etc.) sera mis à disposition sur le stand « inscriptions cosplay
                    ».
                </li>
                <li>
                    Les éventuels accessoires encombrants pourront être stockés derrière la
                    scène.
                </li>

                <li>
                    Les répliques d’armes, dont les matériaux ne présentent pas de danger
                    particulier (mousse, Worbla, carton, plastique, bois léger, etc.).
                    Les objets non apparentés à des armes sont autorisées.
                </li>
                <li>
                    Tout participant doit adhérer à la charte du festival en association notre label
                    Respect Zone.
                </li>

            </ul>

            </p>
        </div>

    </div> <br>
</div>


<!-- Bouton d'incriptions aux concours -->

<div class="row justify-content-center">
    <div class="col-4">
        <div class="btn-tournois">
            <a href="<?php echo base_url('public/documents/Cosplay_DerogationMineurs.pdf');?>" target="_blank">Autorisation parentale</a>
        </div>

    </div>
    <div class="col-4">
        <div class="btn-tournois">
            <a href="<?php echo base_url('public/documents/CharteRespect.pdf');?>" target="_blank">Charte du respect</a>
        </div>


    </div>
    <div class="col-4">
        <div class="btn-tournois"><a href="<?php echo base_url('/public/inscriptionConcours');?>">Inscription aux concours</a></div>

    </div>
    <a href="<?php echo base_url('public/ConcoursCosplay');?>">
</div>


</div>

</body>