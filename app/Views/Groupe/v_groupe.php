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

<div class="row justify-content-md-center">
    <h1 class="titre-groupe">Créer votre groupe ou rejoignez un groupe</h1>
    <p class="info-groupe">
        Créer un groupe vous permet de concourir avec vous amis !<br>
        Un groupe peut contenir jusqu'à 3 participants.<br>
        Vous devez seulement entrer le nom souhaité du groupe.<br>
        Un mot de passe aléatoire sera généré, vous aurez juste à le communiquer à vos amis pour qu'ils puissent le rentrer dans la section "Rejoindre un groupe".<br>
    </p>
    <div class="col col-lg-5">

        <h3 class="titre-groupe">Créer votre groupe</h3>

        <?php echo form_open(base_url() . "/public/verifGroupe");?>
        <div class="input-validation-group">
            <input  type="text" name="nomGroupe" autocomplete="off" class="input-validation" required>
            <label class="user-label">Nom du groupe</label>
        </div><br>
        <button class="button-validation">
            Créer le groupe
            <div class="arrow-wrapper">
                <div class="arrow"></div>

            </div>
        </button>
        <?php echo form_close(); ?>
    </div>
    <div class="col-lg-auto">
        <h3 class="titre-groupe">Rejoindre votre groupe</h3>
        <?php
        echo form_open(base_url() . "/public/rejoindreGroupe");?>
        <div class="input-validation-group">
            <input  type="text" name="nomGroupe" autocomplete="off" class="input-validation" required>
            <label class="user-label">Nom du groupe</label>
        </div><br>
        <div class="input-validation-group">
            <input  type="text" name="mdpGroupe" autocomplete="off" class="input-validation" required>
            <label class="user-label">Mot de passe du groupe</label>
        </div><br>
        <button class="button-validation">
            Rejoindre le groupe
            <div class="arrow-wrapper">
                <div class="arrow"></div>

            </div>
        </button>
        <?php echo form_close(); ?>
    </div>
</div>




