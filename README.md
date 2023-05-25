# jamiepichu

In admin.php in den users Array die Login Daten eingeben, folgendes Format:

```php
$users = [
    ["username" => "Niclas",
        "mail" => "niclas@web.de",
        "password" => "test123"],
        ["username" => "Nutzer2",
        "mail" => "nutzer2@web.de",
        "password" => "test345"]
];
```


Die Seite, die nur nach Login aufgerufen werden darf, folgenden Code ganz am Anfang einfügen:


```php
<?php
session_start();
if (!isset($_SESSION['user'])) {
// Wenn User nicht eingeloggt ist dann zum Login leiten.
    header("Location: admin.php");
    exit;
}
?>
```
