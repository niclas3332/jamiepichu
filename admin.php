<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$users = [

    ["username" => "Niclas",
        "mail" => "niclas@web.de",
        "password" => "test123"]

];


function login($email, $username, $password)
{
    global $users;
    foreach ($users as $user) {
        if (strtolower($user["username"]) == strtolower($username)
            && $user["password"] == $password &&
            strtolower($email) == strtolower($user["mail"])) {
            return $user;
        }
    }
    return false;
}

if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];


    $login = login($email, $username, $password);

    if ($login) {
        // Login logik hier reinklatschen
        $_SESSION["user"] = $login;
        header("Location: index.php");

    } else {
        $error = "Die eingegebenen Daten sind falsch.";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Minecraft Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    <link rel="preload" as="style" href="app-077b60f0.css"/>
    <link rel="modulepreload" href="app-20106add.js"/>
    <link rel="stylesheet" href="app-077b60f0.css"/>
    <script type="module" src="app-20106add.js"></script>
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        <a href="/">
            <img class="w-20 h-20 fill-current text-gray-500" src="logo1.png">
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->

        <form method="POST" >
            <!-- Email Address -->
            <div>
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    Email
                </label>
                <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                       id="email" type="email" name="email" required="required" autofocus="autofocus"
                       autocomplete="email">

            </div>

            <!-- Username -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    Username
                </label>
                <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                       id="email" type="text" name="username" required="required" autofocus="autofocus"
                       autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                    Password
                </label>

                <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                       id="password" type="password" name="password" required="required"
                       autocomplete="current-password">

                <?php
                if (isset($error)) {
                    ?>
                    <ul class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">
                        <li><?= $error; ?></li>
                    </ul>
                    <?php
                }
                ?>
            </div>


            <div class="flex items-center justify-end mt-4">


                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-3">
                    Log in
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
