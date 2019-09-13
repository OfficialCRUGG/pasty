<?php
    if(isset($_POST['username'], $_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $login_statement = $pdo->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
        $login_statement->bindParam("username", $username);
        $login_statement->execute();
        $user = $login_statement->fetch();
        if($user != null) {
            if(password_verify(htmlspecialchars($_POST['password']), $user['passhash'])) {
                $_SESSION['uId'] = $user['id'];
                header("Refresh:0");
            } else {
                echo("Invalid PW");
            }
        }
    }
?>

<form action="" method="post" class="login-form">
    <input class="login-input" type="text" name="username" id="username" placeholder="Username"></input>
    <input class="login-input" type="password" name="password" id="password" placeholder="Password"></input>
    <button class="login-button" type="submit" name="submit">Login</button>
</form>