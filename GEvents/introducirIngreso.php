<?php

include_once "dbConnect.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
    session_start();
}