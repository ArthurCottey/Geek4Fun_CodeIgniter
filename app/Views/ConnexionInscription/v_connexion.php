<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><?php echo link_tag('/public/css/connexion.css');?>
    <?php echo link_tag('/public/js/accueil.js');?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>
<!-- banner section start -->
<div class="banner_connexion">
<br>
    <h1 class="banner_taital">Connexion / Inscription</h1>

</div>
<!-- banner section end -->
</div>
<p class="text-white">|</p>
<body>
<div class="services_section_1">
<div class="container" id="container">

    <!-- Formulaire d'inscription -->
    <div class="form-container sign-up-container">

        <?php echo form_open(base_url() . "/public/ajoutUser");?>
            <h1 class="TitreColor">Créer votre compte</h1>
            <span class="TitreColor">Utilisez votre email pour l'inscription</span>
            <input type="text" name="login" placeholder="Login" required />
            <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
            <input class="btn-inscription" type="submit" value="Inscription"/>
        <?php echo form_close(); ?>

    </div>

    <!-- Formulaire de connexion -->
    <div class="form-container sign-in-container">
        <?php
        echo form_open(base_url() . "/public/identificationUser");
        ?>
            <h1 class="TitreColor">Connexion</h1>
            <span class="TitreColor">Connecter vous avec vos identifiants</span>
            <input type="email" name="email" placeholder="Email"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
            <?= $validation->getError('email');?>
            <input type="password" name="password" id="mdp" placeholder="Mot de passe" />
        <div class="TitreColor"><input type="checkbox" onclick="Afficher()" style="width: auto;">Afficher le mot de passe</div>

        <script>
            function Afficher()
            {
                var input = document.getElementById("mdp");
                if (input.type === "password")
                {
                    input.type = "text";
                }
                else
                {
                    input.type = "password";
                }
            }
        </script>
        <?= $validation->getError('password');?>
            <a href="#" class="TitreColor">Mot de passe oublié ?</a>
            <input class="btn-inscription" type="submit" name="submit" value="Connexion"/>
        <?php echo form_close(); ?>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 style="color: whitesmoke;">Bienvenue</h1>
                <p>Entrez vos données personnelles et rejoignez nous</p>
                <button class="ghost" id="signIn">Connexion</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1 style="color: whitesmoke;">Bonjour !</h1>
                <p>Entrez vos données personnelles et rejoignez nous</p>
                <button class="ghost" id="signUp">Inscription</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
            </div>

        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>

</body>