<?php
session_start();

if (!isset($_SESSION['user'])) {
// Wenn User nicht eingeloggt ist dann zum Login leiten.
    header("Location: admin.php");
    exit;
}
?>

Willkommen <?= $_SESSION["user"]["username"]; ?>!
