<?php
    session_start();
    unset($_SESSION['apriori_toko_id']);
    unset($_SESSION['apriori_toko_username']);
    unset($_SESSION['apriori_toko_level']);
    unset($_SESSION['apriori_toko_key']);
    unset($_SESSION['apriori_toko_last_login']);
    unset($_SESSION['apriori_toko_view']);
    session_destroy();
    header("location:login.php");
