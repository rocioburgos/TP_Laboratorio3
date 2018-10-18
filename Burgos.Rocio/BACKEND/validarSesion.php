<?php

session_start();
    if(!isset($_SESSION['DNIempleado']))
    {
        header("Location: ./.././login.html");
     
    }
?>