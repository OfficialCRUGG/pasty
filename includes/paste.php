<?php
$paste = htmlspecialchars($_GET["url"]);

$paste_statement = $pdo->prepare("SELECT * FROM `pastes` WHERE `id`=:id LIMIT 1");
$paste_statement->bindParam("id", $paste);
$paste_statement->execute();
$paste_result = $paste_statement->fetch();
if($paste_result) {
    ?>
        <div class="code-container">
            <pre><code class="<?php echo($paste_result["lang"]); ?>"><?php echo(htmlspecialchars($paste_result["content"])); ?></code></pre>
        </div>
        <div class="info-container">
            <span class="author">Uploaded by <?php
                if($paste_result["displayAuthor"] == false) {
                    echo("Anonymous");
                } else {
                    $user_statement = $pdo->prepare("SELECT `username` FROM `users` WHERE `id`=:id LIMIT 1");
                    $user_statement->bindParam("id", $paste_result['author']);
                    $user_statement->execute();
                    $user_result = $user_statement->fetch();
                    if($user_result) { 
                        echo($user_result['username']);
                    } else {
                        echo("Invalid User");
                    }
                }
            ?></span>
            <span class="date">Uploaded on <?php
                echo($paste_result["publish"])
            ?></span>
        </div>
    <?php
} else {
    ?>
        <pre><code class="plaintext">This paste was not found.</code></pre>
    <?php
}
?>