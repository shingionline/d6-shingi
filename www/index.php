<?php 
require_once('includes/db_connection.php');
include('includes/header.php'); ?>
<h2>d6 - Shingi</h2>

<?php
require('includes/menu.php');

if (isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] >= 1 && $_GET['p'] <= 3) {
    $p = $_GET['p'];
} else {
    $p = 1;
}

include('pages/page-' . $p . '.php');
include('includes/footer.php');
?>