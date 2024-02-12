<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php echo link_tag('/public/css/connexion.css');?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="../../../public/ressources/jquery-3.6.3.min.js"></script>
    <?php echo link_tag('/public/css/');?><!-- a recuperer dans accueil-->

</head>
<!-- banniere section start -->
<div class="banner_connexion">
    <br>
    <h1 class="banner_taital">Connexion / Inscription</h1>

</div>
<!-- banniere section end -->
</div>
<body>
<p class="text-white">|</p>
<div class="container" id="container">

    <!-- Page de connexion -->
    <div class="form-container sign-up-container">
        <?php echo form_open(base_url() . "/public/identificationUser");?>
        <h1 class="TitreColor">Connexion</h1>
        <span class="TitreColor">Connecter vous avec vos identifiants</span>
        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
        <input id="mdpConnexion" type="password" name="password" placeholder="Mot de passe" />
        <div class="TitreColor"><input type="checkbox" onclick="Afficher()" style="width: auto;">Afficher le mot de passe</div>
        <a href="#" class="TitreColor">Mot de passe oublié ?</a>
        <input class="btn-inscription" type="submit" value="Connexion"/> <!-- data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
        <?php echo form_close(); ?>
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
    </div>
    <!-- Page connexion end-->

    <!-- Page inscription start-->
    <div class="form-container sign-in-container">
        <?php
            echo form_open(base_url() . "/public/ajoutUser");
        ?>
        <h1 class="TitreColor">Créer votre compte </h1>
        <span class="TitreColor">Utilisez votre email pour l'inscription</span>
        <input type="text" name="login" placeholder="Login" required/>
        <?= $validation->getError('login');?>
        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
        <?= $validation->getError('email');?>

        <input class="btn-inscription" type="submit" value="Inscription"/> <!--data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
        <?php echo form_close(); ?>
    </div>
    <!-- Page inscription end-->

    <!-- Panel start-->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1 style="color: whitesmoke;">Bienvenue</h1>
                <p>Entrez vos données personnelles et rejoignez nous</p>
                <button class="ghost" id="signUp">Connexion</button>
            </div>
            <div class="overlay-panel overlay-left">
                <h1 style="color: whitesmoke;">Bonjour !</h1>
                <p>Entrez vos données personnelles et rejoignez nous</p>
                <button class="ghost" id="signIn">Inscription</button>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button> -->

            </div>
        </div>
    </div>
    <!-- Panbel end-->
</div>


<!-- Formulaire d'inscription start -->
<button type="button" id="runModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        hidden></button>

<!-- Formulaire d'inscription -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="margin: auto;">Veuillez completer le formulaire </h1><hr>
            </div>
            <div class="modal-body">
                <!-- <form class="needs-validation" novalidate> -->
                <?php
                echo form_open(base_url() . "/public/ajoutBdd");
                ?>
                <!-- On affiche le pseudonyme et l'adresse mail de l'utilisateur -->
                <div class="row justify-content-around">
                    <div class="col-4">
                        <label for="validationCustom01">Pseudonyme</label>
                        <?php
                        if(isset($infosUser))
                        {
                        ?>
                        <input type="text" name="pseudo" class="form-control" id="validationCustom01" style="margin-right: 155px;"
                               value="<?php echo $infosUser[0] ?>" readonly>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-4">
                        <label for="validationCustom02">Adresse mail</label>
                        <?php
                        if(isset($infosUser))
                        {
                        ?>
                        <input type="text" name="mail" class="form-control"
                               value="<?php echo $infosUser[1] ?>" readonly>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- Mot de passe et vérification du mot de passe -->
                <div class="row justify-content-around">
                    <div class="col-4">
                        <label for="mdp">*Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="mdp" style="margin-right: 155px;"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}"
                               title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 12 caractères ou plus"
                               oninput="comparePasswords()" required>
                    </div>
                    <div class="col-4">
                        <label  class="text-center" for="validationCustom02">*Confirmez le mot de passe</label>
                        <input type="password" class="form-control" id="validationCustom02" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}"
                               oninput="comparePasswords()" required>
                    </div>
                </div>

                <p id="messageConf"></p>
                <style>

                        /* Add a green text color and a checkmark when the requirements are right */
                        .valid {
                            color: green;


                        }

                        .valid:before {
                            position: relative;
                            left: -35px;
                        }

                        /* Add a red text color and an "x" when the requirements are wrong */
                        .invalid {
                            color: red;
                        }


                    </style>
                <div id="message">
                    <h6>Le mot de passe doit contenir les éléments suivants :</h6>
                    <p id="letter" class="invalid">Une lettre minuscule</p>
                    <p id="capital" class="invalid">Une lettre en majuscule </p>
                    <p id="number" class="invalid">Un nombre</p>
                    <p id="length" class="invalid">Minimum 12 caractères</p>
                </div>
               <script>

                    function comparePasswords() {

                        var password1 = document.getElementById("mdp").value;
                        var password2 = document.getElementById("validationCustom02").value;
                        var validBtn = document.getElementById("create");
                        var messageConf = document.getElementById("messageConf");

                        if (password1 == password2) {// confirme si les mdp sont identiques
                            messageConf.innerHTML = "Mots de passe identiques";
                            validBtn.hidden = false;
                            messageConf.style.color = "green";
                            messageConf.style.color = "green";
                        } else {
                            messageConf.innerHTML = "Les mots de passe ne correspondent pas";
                            messageConf.style.color = "red";
                            messageConf.style.color = "red";
                            validBtn.hidden = true;

                        }
                    }
                    var ValideMdp = 0;
                    var myInput = document.getElementById("mdp");
                    var letter = document.getElementById("letter");
                    var capital = document.getElementById("capital");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    var text = document.getElementById("myText");
                    var text2 = document.getElementById("myText2");

                    myInput.onfocus = function() {
                        document.getElementById("message").style.display = "block";
                    }

                    myInput.onblur = function() {
                        document.getElementById("message").style.display = "none";
                    }

                    myInput.onkeyup = function() {
                        // Validation en lettre minuscule
                        var lowerCaseLetters = /[a-z]/g;
                        if(myInput.value.match(lowerCaseLetters)) {
                            letter.classList.remove("invalid");
                            letter.classList.add("valid");
                        } else {
                            letter.classList.remove("valid");
                            letter.classList.add("invalid");
                        }

                        // Validation lettre en majuscule
                        var upperCaseLetters = /[A-Z]/g;
                        if(myInput.value.match(upperCaseLetters)) {
                            capital.classList.remove("invalid");
                            capital.classList.add("valid");
                        } else {
                            capital.classList.remove("valid");
                            capital.classList.add("invalid");
                        }

                        // Validation nombre
                        var numbers = /[0-9]/g;
                        if(myInput.value.match(numbers)) {
                            number.classList.remove("invalid");
                            number.classList.add("valid");
                        } else {
                            number.classList.remove("valid");
                            number.classList.add("invalid");
                        }

                        // Validation longueur chaine
                        if(myInput.value.length >= 12) {
                            length.classList.remove("invalid");
                            length.classList.add("valid");
                        } else {
                            length.classList.remove("valid");
                            length.classList.add("invalid");
                        }

                    }
                </script>


                <div class="row justify-content-around">
                    <div class="col-4">
                        <label for="validationCustom03">*Nom</label>
                        <input type="text" name="nom" class="form-control" id="validationCustom03" style="margin-right: 155px;"
                               value="" required pattern="[A-Za-z]{3,14}" required title="Entrer votre nom">
                    </div>
                    <div class="col-4">
                        <label for="validationCustom04">*Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="validationCustom04"
                               value=""  pattern="[A-Za-z]{3,14}"  required title="Entrer votre prénom">
                    </div>
                </div>
                <br>
                <div class="row justify-content-around">
                    <div class="col-4">
                        <label for="validationCustom06">*Téléphone</label>
                        <input type="text" name="telephone" class="form-control" id="validationCustom06" style="margin-right: 200px;"
                               pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
                               required title="Entrer un numéro de téléphone valide avec des '-' après chaque numéro">

                    </div>
                    <div class="col-4">
                        <label for="validationCustom07">*Date de naissance</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input class="datepicker" name="dateNaiss" data-date-format="yyyy-mm-dd" required
                                   pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Entrer votre age" style=" text-align: center;">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <script>
                            $('.datepicker').datepicker({
                                format: 'yyyy-mm-dd',
                                startDate: '-3d'
                            });

                        </script>
                    </div>
                </div>
                <br>
                <div class="row justify-content-around">
                    <div class="col-4">
                        <label for="validationCustom05">*Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="validationCustom05"
                               title="Entrer le numéro de votre rue et le nom de rue" required>
                    </div>
                    <div class="col-4">
                        <label for="validationCustom06">*Ville</label>
                        <input type="text" name="ville" class="form-control" id="validationCustom06"
                               pattern="[A-Za-z -]{3,45}" title="Entrer le nom de votre ville" required>
                    </div>
                    <div class="col-4">
                        <label for="validationCustom07">*Code Postal</label>
                        <input type="text" name="codePostal" class="form-control" id="validationCustom07"
                               pattern="[0-9]{5}" title="Entrer votre code postal" required>
                    </div>
                </div>
                <br>
                <div><input type="checkbox" value="" id="invalidCheck" style="width: auto;" required> Accepter les conditions du festival</div>
                <input type="submit" onclick="window.open('<?php echo base_url('public/documents/CharteRespect.pdf');?>', '_blank');"
                       value="Lire les conditions du festival" />

                <br><br>
                <p>*Champs obligatoires</p>
                <br>
                <!-- </form> -->
                <button class="btn btn-primary" id="create" type="submit" hidden>Inscription</button>

                <script>
                    //Si l'utilisateur a moins de 12 ans, il ne pourra pas créer de compte
                    $('#create').on('click', function(e)
                    {
                        var dateNaiss = new Date($('input[name="dateNaiss"]').val());
                        var today = new Date();
                        var age = today.getFullYear() - dateNaiss.getFullYear();
                        var monthDiff = today.getMonth() - dateNaiss.getMonth();

                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dateNaiss.getDate()))
                        {
                            age--;
                        }

                        //Si l'utilisateur à moins de 12 ans
                        if (age < 12)
                        {
                            //Empêche l'envoi du formulaire si l'âge est inférieur à 12
                            e.preventDefault();
                            //Affiche un message
                            alert("Vous devez avoir au moins 12 ans pour vous inscrire.");
                        }
                    });
                </script>

                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler l'inscription</button>
                <!--<button type="button" class="btn btn-primary">Understood</button>-->
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                    crossorigin="anonymous">
            </script>
        </div>
    </div>
</div>
<br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
</script>

<?php
//si la variable $userExist existe, la valeur "false" est obligatoirement affectée
if (isset($userExist))
{
    ?>
    <!-- Permet l'affichage du deuxième formulaire d'inscription -->
    <script>
        $("#runModal").trigger("click");
    </script>
    <?php
}
?>
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