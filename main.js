function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    if (email == '') {
        alert("Please fill in your email address")
        return false;
    }
    if (password == '')
    {
        alert("Please fill in your password")
        return false;
    }

    let text;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        text = "Input OK";
    } else {
        alert("Invalid email address")
        return false;
    }

    if(password.length < 8) {
        alert("Password length must be at least 8 characters")
        return false;
    }
    var lowerCaseLetters = /[a-z]/g;
    if (!password.match(lowerCaseLetters)){
        alert("Password length must contain at least 1 lowercase character")
        return false;
    }

    var upperCaseLetters = /[A-Z]/g;
    if (!password.match(upperCaseLetters)){
        alert("Password length must contain at least 1 uppercase character")
        return false;
    }

    var numbers = /[0-9]/g;
    if (!password.match(numbers)){
        alert("Password length must contain at least 1 number character")
        return false;
    }

    alert("Logged in successfully")
    return true;
}