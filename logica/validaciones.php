<?php
if(isset($token)){
function validar_email($email){
    $validate_email = explode("@", $email);
    if(count($validate_email) == 2){
        if($validate_email[1] == "gmail.com" || $validate_email[1] == "hotmail.com" || $validate_email[1] == "outlook.com")
            return true;
        else
            return false;
    } else {
        return false;
    }
}
} else {
    header("Location: ../error.php");
}