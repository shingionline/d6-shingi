<?php 
require_once('includes/db_connection.php');
include('includes/header.php'); ?>
<h2>d6 - Shingi</h2>

<?php
require('includes/menu.php');

if (isset($_GET['q']) && is_numeric($_GET['q']) && $_GET['q'] >= 1 && $_GET['q'] <= 2) {
    $q = $_GET['q'];
} else {
    $q = 1;
}

include('pages/page-' . $q . '.php');
include('includes/footer.php');
?>