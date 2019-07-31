function passwordValidator()
{
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password_confirmation").value;

    if (password != confirmPassword)
    {
        alert("Les mots de passe choisis ne sont pas identiques !");
        return false;
    } else {
        return true;
    }
}