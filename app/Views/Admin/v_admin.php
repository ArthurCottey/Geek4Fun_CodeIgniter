<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<!-- banner section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">ADMINISTRATION</h1>
</div>
<!-- banner section end -->
</div>





<!-- Button trigger modal -->


<!-- Modal Creation de concours -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Veuillez completer le formulaire </h1>
            </div>
            <div class="modal-body">

                <div class="row justify-content-around">
                    <div class="container-fluid">
                        <?php
                        echo form_open(base_url() . "/public/ajoutConcours", ['enctype' => 'multipart/form-data']);
                        ?>
                        <label for="date">Date du concours</label>
                        <input type="date" id="date" name="date" required><br><br>

                        <!-- Bouton theme concours -->
                        <div>
                            <label for="state" class="form-label">Theme du concours</label>
                            <select class="form-select" id="state" name="theme" required>
                                <option>Littérature</option>
                                <option>Comics</option>
                                <option>Mangas</option>
                                <option>BD</option>
                                <option>Animes</option>
                                <option>Films ou séries</option>
                                <option>Dessins animés</option>
                                <option>Jeux vidéo </option>
                            </select>
                        </div><br>
                        <!-- Bouton categorie d'age -->
                        <div>
                            <label for="state" class="form-label ">Catégorie d'age </label><br>
                            <div class="form-check form-check-inline text-admin">
                                <input class="form-check-input" type="radio" name="categAge" id="inlineRadio1" value=0required>
                                <label class="form-check-label" for="inlineRadio1">Mineur</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="categAge" id="inlineRadio2" value=1 required>
                                <label class="form-check-label" for="inlineRadio2">Majeur</label>
                            </div>
                        </div><br>
                        <!-- Bouton groupe -->
                        <div>
                            <label for="state" class="form-label">Choix individuel / groupe </label><br>
                            <div class="form-check form-check-inline text-admin">
                                <input class="form-check-input" type="radio" name="groupe" id="inlineRadio1" value="0" required>
                                <label class="form-check-label" for="inlineRadio1">Individuel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="groupe" id="inlineRadio2" value="1" required>
                                <label class="form-check-label" for="inlineRadio2">Groupe</label>
                            </div>
                        </div><br>

                        <!-- Bouton theme concours -->
                        <div>
                            <label for="nbPlace" class="form-label">Nombre de place</label>
                            <select class="form-select" id="nbPlace" name="nbPlace" required>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>25</option>
                                <option>30</option>
                                <option>35</option>
                                <option>40</option>
                                <option>45</option>
                                <option>50</option>
                            </select>
                        </div><br>

                        <label for="image">Image pour la page d'incription aux concours </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image"
                                   aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="image">Choisir votre image</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: rgba(43,34,120,0.77); margin-right: 10px;">Fermer</button>
                <button type="submit" class="btn" style="background-color: rgb(43,34,120);">Créer concours</button>
            </div>
        </div>
        <?php echo form_close()?>
    </div>
</div>





<!-- Liste des concours présents -->
<table class="table table-striped">

    <tr>

        <th class="text-right">Ajout de concours :</th>
        <th>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-circle-plus fa-3x"></i>
            </button>
        </th>



        <th>Date</th>
        <th>Thème</th>
        <th>Age</th>
        <th>Groupe</th>
        <th>Nombre de places</th>
        <th>Nombre de places restantes</th>
    </tr>
    <?php foreach ($listeConcours as $ligne):
        $imgDefaut = 0;
        if ($ligne->imagePageInscription_concours == "http://localhost/Geek4Fun_CodeIgniter/public/images/ImagesConcours/ImagesPageInscription/ImageDefaut.png")
        {
            $imgDefaut = 1;
        }
        ?>
        <tr>
            <td>
                <a href="#" data-id="<?php echo $ligne->id_concours; ?>" class="btn-supprimer">
                    <img src="<?= base_url('public/images/Admin/ImageSupprimer.png')?>"class="img-admin-supprimer"
                         alt="Supprimer" onclick="supprimerOccurrence(<?= $ligne->id_concours ?>, <?= $imgDefaut ?>)">
                </a>
            </td>
            <!--<td>
                <a href="#" data-id="<?php echo $ligne->id_concours; ?>" class="btn-modifier">
                    <img src="<?= base_url('public/images/Admin/ImageModifier.png')?>" class="img-admin-ajouter"
                         alt="Modifier" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                </a>
            </td>-->
            <td></td>
            <td><?= $ligne->date_concours ?></td>
            <td><?= $ligne->theme_concours ?></td>
            <td>
                <?php
                if($ligne->categAge_concours == 1)
                {
                    echo ("Majeur");
                }
                else
                {
                    echo ("Mineur");
                }
                ?>
            </td>
            <td>
                <?php
                if($ligne->groupe_concours == 1)
                {
                    echo ("OUI");
                }
                else
                {
                    echo ("NON");
                }
                ?>
            </td>
            <td><?= $ligne->nbPlace_concours ?></td>
            <td><?= $ligne->NbPlaceRestant_concours ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- modal update concours -->
<!--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="margin: auto;">Modification du concours </h1><hr>
            </div>
            <div class="modal-body"> -->
                <!--<div class="row justify-content-around">-->
                <? //echo form_open(base_url() . "/public/modificationConcours"?>

                <!--<div class="mb-3">
                    <label for="data-id-input" class="form-label"></label>
                    <input type="text" class="form-control" id="id-concours">
                </div>

                <label for="date">Date du concours</label>
                <input type="date" id="date" name="date" required><br><br>-->

                <!-- Bouton theme concours -->
                <!--<div>
                    <label for="state" class="form-label">Theme du concours</label>
                    <select class="form-select" id="state" name="theme" required>
                        <option>Littérature</option>
                        <option>Comics</option>
                        <option>Mangas</option>
                        <option>BD</option>
                        <option>Animes</option>
                        <option>Films ou séries</option>
                        <option>Dessins animés</option>
                        <option>Jeux vidéo </option>
                    </select>
                </div><br>-->

                <!-- Nombre de place concours -->
                <!--<div>
                    <label for="nbPlace" class="form-label">Nombre de place</label>
                    <select class="form-select" id="nbPlace" name="nbPlace" required>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                        <option>30</option>
                        <option>35</option>
                        <option>40</option>
                        <option>45</option>
                        <option>50</option>
                    </select>
                </div><br>

                <label for="image">Image pour la page d'incription aux concours </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image"
                           aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="image">Choisir votre image</label>
                </div><br><br><br>
                <button type="submit" class=" btn btn-primary">
                    S'inscrire au concours
                </button>
                <button type="button" class=" btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Fermer</button>-->
                <?php //echo form_close();?>
            <!--</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
    <script>
        // Récupérer le bouton qui déclenche le modal
        var boutonModifier = document.querySelector('.btn-modifier');

        // Récupérer l'input dans le modal
        var inputModal = document.querySelector('#id-concours');

        // Ajouter un événement de clic sur le bouton
        boutonModifier.addEventListener('click', function () {
            // Récupérer la valeur de data-id
            var idConcours = boutonModifier.getAttribute('data-id');

            // Insérer la valeur de data-id dans l'input dans le modal
            inputModal.value = idConcours;
        });
    </script>
    <script>
        $(document).ready(function() {
            // Lorsque le bouton avec la classe "btn-modifier" est cliqué
            $(".btn-modifier").click(function() {
                // Récupérez la valeur de "data-id" à partir de l'attribut "data-id" du bouton cliqué
                var dataId = $(this).data("id");
                // Insérez la valeur de "data-id" dans l'input de votre modal avec l'id "data-id-input"
                $("#id_concours").val(dataId);
            });
        });

    </script>

</div>-->


<script>
    function supprimerOccurrence(id, imgDefaut)
    {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce concours ?')) {
            $.ajax({
                url: '<?= base_url('public/supprimerConcours') ?>',
                type: 'post',
                data: { id: id, lienImg: imgDefaut},
                success: function()
                {
                    //Recharge la table pour afficher les mises à jour
                    location.reload();
                }
            });
        }
    }

    function modifierOccurrence(id)
    {
        if (confirm('Êtes-vous sûr de vouloir modifier ce concours ?')) {
            $.ajax({
                url: '<?= base_url('public/modifierConcours') ?>',
                type: 'post',
                data: { id: id, lienImg: imgDefaut},
                success: function()
                {
                    //Recharge la table pour afficher les mises à jour
                    location.reload();
                }
            });
        }
    }

</script>

<footer>
    <br>

    <div class="footer-basic">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url('public/');?>">Accueil</a></li>
            <li class="list-inline-item"><a href="<?php echo base_url('public/Qui-Sommes-Nous');?>">Qui Sommes Nous</a></li>
            <li class="list-inline-item"><a href="<?php echo base_url('public/cosplay');?>">Cosplay</a></li>
            <li class="list-inline-item"><a href="#">Tournois</a></li>
            <li class="list-inline-item"><a href="#">Cybersécurité</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <br>
        <div class="social">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <br>
            <p class="copyright">Geek4Fun ©2022</p>
        </div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>






