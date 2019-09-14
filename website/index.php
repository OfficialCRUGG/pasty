<?php
    include("../utils/config.php");
    include("../utils/database.php");
    if(!isset($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['uId'])) {
        $login = true;
    } else {
        $login = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Fira+Sans&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <title><?php echo($title) ?></title>
    <style>
        body {
            margin: 0;
            background-color: #282c34;
            font-family: 'Fira Sans', sans-serif;
            color: white;
        }
        code {
            font-family: 'Fira Mono', monospace;
        }
        .author {
            position: fixed;
            left: 0;
            font-size: 20px;
            line-height: 40px;
            margin-left: 10px;
        }
        .date {
            position: fixed;
            right: 0;
            font-size: 20px;
            line-height: 40px;
            margin-right: 10px;
        }
        .code-container {
            margin: 0;
            background-color: #282c34;
            width: 100vw;
            height: calc(100vh - 40px);
            position: fixed;
            top: 0;
            overflow-y: auto;
        }
        .info-container {
            margin: 0;
            background-color: #21252b;
            width: 100vw;
            height: 40px;
            position: fixed;
            bottom: 0;
        }
        .paste-input {
            width: 90vw;
            height: 60vh;
        }
        .login-form {
            max-width: 320px;
            width: 90%;
            background-color: #21252b;
            padding: 40px;
            transform: translate(-50%, -50%);
            position: absolute;
            top: 50%;
            left: 50%;
            color: #fff;
        }
        .login-input {
            background: none;
            border: none;
            border-bottom: 1px solid #434a52;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            height: 18px;
            width: 100%;
            font-size: 18px;
            margin: 10px 0 10px 0;
        }
        .login-input::placeholder {
            color: #ababab;
        }
        .login-button {
            background-color: transparent;
            border: 1px solid white;
            border-radius: 15px;
            color: white;
            padding: 5px 20px 5px 20px;
            width: 100%;
            margin-top: 10px; 
        }
        .paste-input {
            resize: none;
            font-family: 'Fira Mono', monospace;
            background-color: #21252b;
            color: white;
            border: 0;
        }
        .create-form {
            padding: 20px;
        }
        .create-button {
            background-color: transparent;
            border: 1px solid white;
            border-radius: 15px;
            color: white;
            padding: 5px 20px 5px 20px;
            margin-top: 10px; 
        }
    </style>
    <link rel="stylesheet" href="//crugg.de/cdn/highlight.js/styles/atom-one-dark.css">
    <script src="//crugg.de/cdn/highlight.js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
    <?php 
        if($_GET["url"] == "index.php") {
            if(!$login) {
                include("../includes/login.php");
            } else {
                if(isset($_GET["logout"]) && $_GET["logout"] == "1") {
                    session_destroy();
                    header("Location:" . $path);
                } else {
                    include("../includes/create.php");
                }
            }
        } else if($_GET["url"] == "hash" && $enable_hash_creator == true) {
            include("../includes/hash.php");
        } else {
            include("../includes/paste.php");
        }
    ?>
</body>
</html>