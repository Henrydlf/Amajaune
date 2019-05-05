<?php
    session_start();
    include("interface.php")

    $_SESSION['panier']=isset($_POST["panier"])? $_POST["panier"] : "";

    setPanier($_SESSION['panier']);
?>