<?php

// Valido que este creada la sesion para que pueda entrar a la pagina

session_start();

if (empty($_SESSION['autentificado'])) {
   	 header("location:../login.php");
   	 exit; // sin esto, la página seguía ejecutándose (borrados, altas) aunque no hubiera login
}

?>