<?php
if(isset($token)){
function validar_email($email){
    $validate_email = explode("@", $email);
    if(count($validate_email) == 2 && $validate_email[1] == "gmail.com"){
        return true;
    } else {
        return false;
    }
}
} else {
    header("Location: ../404");
}