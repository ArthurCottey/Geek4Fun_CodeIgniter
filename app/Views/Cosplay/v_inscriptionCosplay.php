<head>
    <?php echo link_tag('/public/css/ConcoursCosplay.css');?>
</head>

<!-- banner section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">Choix du concours</h1>
</div>
<!-- banner section end -->
</div>



<!-- Si l'utilisateur est inscrit à un concours, affiche le bouton "Se désinscrire du concours" -->
<?php
$session = \Config\Services::session();

?>

<div class="container">
    <?php if ($session->get("idConcours"))
    {?>
        <div class="text-center">
            <p class="text-white">|</p>
            <h2 class="inscription-warning"><i class="fa-solid fa-triangle-exclamation">
                </i> Attention vous êtes déjà inscrit à un concours <i class="fa-solid fa-triangle-exclamation"></i></h2>
            <h4 class="inscription-warning">Si vous êtes déjà inscrit et que vous inscrivez à un autre concours l'inscription précédente sera annulé</h4>

        </div>
        <?php
    }?>
    <div class="row">

        <?php foreach ($listeConcours as $ligne): ?>
        <div class="col">

                <div class="card ">
                    <a href="#" data-id="<?php echo $ligne->id_concours; ?>" class="inscription-concours"
                       onclick="inscription(<?= $ligne->id_concours ?>)">
                    <img src="<?= $ligne->imagePageInscription_concours ?>" class="img-card" alt="S'inscrire à ce concours">

                    <div class="card-details">
                        <p class="text-title">
                            <?= $ligne->theme_concours ?><br>
                            <?php
                            if($ligne->groupe_concours == 1)
                            {
                                echo ("Groupe");
                            }
                            else
                            {
                                echo ("Individuel");
                            }
                            ?></p>
                        <p class="text-body">

                            Le concours aura lieu le <?= $ligne->date_concours ?><br>
                            Nombre de place du concours <?= $ligne->nbPlace_concours ?><br>
                            Nombre de place restante <?= $ligne->NbPlaceRestant_concours;?><br>
                            <?php
                            if($ligne->id_concours == $session->get("idConcours"))
                            {
                                echo ("Vous êtes inscrit à ce concours");
                            }
                            ?>
                        </p>
                    </div></a>
                    <button type="button" id="runModal" class="card-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>
                        Inscription
                    </button>


                </div>

        </div>

        <?php endforeach; ?>
    </div>

</div>



<!-- Formulaire d'inscription -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="margin: auto;">Importez vos documents de références pour le concours (1 minimum). </h1><hr>
            </div>
            <div class="modal-body">
                <!--<div class="row justify-content-around">-->
                <?= form_open(base_url() . "/public/UploadImagesInscription", ['enctype' => 'multipart/form-data']);?>

                <div class="col-12">
                    <label for="validationCustom05">*Image (formats PNG et JPEG uniquement)</label>
                    <input type="file" name="img" class="form-control" id="validationCustom05" accept=".png, .jpg, .jpeg" required>
                </div>
                <div class="col-12">
                    <label for="validationCustom06">Bande son (2Mo Max) (format MP3 uniquement)</label>
                    <input type="file" name="musique" class="form-control" id="validationCustom06" accept=".mp3" >
                </div>
                <div class="col-12">
                    <label for="validationCustom06">Video (2Mo Max)(format MP4 uniquement)</label>
                    <input type="file" name="video" class="form-control" id="validationCustom06" >
                </div><br><br>

                <p> *Champs obligatoire</p><br><br>
                <p>Autorisation parentale à remplir obligatoirement pour les participants mineurs</p>
                <input type="submit" onclick="window.open('<?php echo base_url('public/documents/Cosplay_DerogarionMineurs.pdf');?>', '_blank');"
                       value="Autorisation parentale" />
                <br><br><br>

                <button type="submit" class=" btn btn-primary">
                    S'inscrire au concours
                </button>
                <button type="button" onclick="annuleInscription()" class=" btn btn-danger">
                    Annuler l'inscription
                </button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
</div>
<script>
    //Inscrit l'utilisateur au concours choisi
    function inscription(id)
    {
        //Si l'utilisateur est connecté à un compte
        if(<?php echo ($session->get("id") !== null) ? 'true' : 'false'; ?>)
        {
            $.ajax({
                url: '<?= base_url('public/nbPlaceDisponible') ?>',
                type: 'post',
                data: { id: id},
                success: function (response)
                {
                    //Conversion de l'objet JSON en Array
                    var result = JSON.parse(response);
                    //Si le concours n'a plus de place disponible
                    if(result[0].nbPlaceRestant_concours === "0")
                    {
                        alert("Le concours que vous avez sélectionné n'a plus de place de disponible. Veuillez choisir un autre concours ou attendre qu'une place se libère.");
                    }
                    //Si il reste des places au concours sélectionné
                    else
                    {
                        if (confirm('Êtes-vous sûr de vouloir vous inscrire à ce concours ? Vous ne pouvez concourir que pour un seul concours à la fois.'))
                        {
                            $.ajax({
                                url: '<?= base_url('public/choixUserConcours') ?>',
                                type: 'post',
                                data: { id: id},
                                success: function()
                                {
                                    //Affiche le modal pour uploader des fichier
                                    $("#runModal").trigger("click");
                                }
                            });
                        }
                    }
                }
            });
        }
        //Si l'utilisateur n'est pas connecté à un compte
        else
        {
            alert("Vous devez être connecté pour vous inscrire à un concours");
        }
    }

    function annuleInscription()
    {
        $.ajax({
            url: '<?= base_url('public/annuleInscription') ?>',
            success: function()
            {
                $('#staticBackdrop').modal('hide');
            }
        })
    }
</script>
