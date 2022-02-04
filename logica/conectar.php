<?php
if(isset($token))
    $con = new mysqli("localhost","root","","organigrama_bd");
else 
    header("Location: ../40");