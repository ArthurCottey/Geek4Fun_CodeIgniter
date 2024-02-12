<head>
    <?php echo link_tag('/public/css/groupe_css.css');?>
</head>

<!-- banner section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">Groupe</h1>
</div>
<!-- banner section end -->
</div>

<p class="text-white">|</p>
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="margin: auto;">
                <h1 class="modal-title "><?= $infosGroupe[0]->nom_groupe ?></h1>
            </div>
            <div class="modal-body">
                <p>Le groupe est composé de :
                <ul class="list-group list-group-flush">
                    <?php foreach ($infosGroupe as $ligne): ?>
                        <li class="list-group-item"><?= $ligne->pseudo_user ?></li>
                    <?php endforeach; ?>
                </ul><br>
                Mot de passe du groupe : <?= $infosGroupe[0]->mdp_groupe ?>
                </p>
            </div>
            <div class="modal-footer">
                <?php
                echo form_open(base_url() . "/public/quitterGroupe");?>
                <button type="submit" class="btn btn-primary">Quitter le groupe</button>
                <?php echo form_close();?>

            </div>
        </div>
</div>





<br><br>
