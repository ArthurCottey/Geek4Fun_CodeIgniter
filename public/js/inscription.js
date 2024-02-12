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