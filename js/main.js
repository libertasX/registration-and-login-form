// Formulareingaben überprüfen.
// "user" Eingaben überprüfen.
function Username(){

    let username = document.getElementById("username").value;
    let  re = new RegExp(/^[a-zA-Z0-9_]+$/); // Erlaubte Zeichen im Benutzernamen

    if (username.length < 4 || re.test(username) == false || username.indexOf("_") == 0) {
        document.getElementById("username").style.backgroundColor = "#be2e2e";
    }
    else {
        document.getElementById("username").style.backgroundColor = "#3ee23e";
    }
}

// "email" Eingaben überprüfen.
function UserEmail(){

    let email = document.getElementById("email").value;
    if (email.search(/[@]/i) == -1 || email.search(/[.]/i) == -1) {
        document.getElementById("email").style.backgroundColor = "#be2e2e";
    }

    else {
        document.getElementById("email").style.backgroundColor = "#3ee23e";
    }
}

// "Password" Einagben überprüfen.
function UserPassword(){

    let password = document.getElementById("password").value;
    if (password.length < 8 || password.search(/[0-9]/i) == -1 || password.search(/[a-zA-Z]/i) == -1) {
        document.getElementById("password").style.backgroundColor = "#be2e2e";
    }

    else {
        document.getElementById("password").style.backgroundColor = "#3ee23e";
    }
}
