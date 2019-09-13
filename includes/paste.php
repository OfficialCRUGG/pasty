<?php
$paste = htmlspecialchars($_GET["url"]);

$paste_statement = $pdo->prepare("SELECT * FROM `pastes` WHERE `id`=:id LIMIT 1");
$paste_statement->bindParam("id", $paste);
$paste_statement->execute();
$paste_result = $paste_statement->fetch();
if($paste_result) {
    ?>
        <div class="code-container">
            <pre><code class="<?php echo($paste_result["lang"]); ?>"><?php echo($paste_result["content"]); ?></code></pre>
        </div>
        <div class="info-container">
            <span class="author">Uploaded by <?php
                if($paste_result["author"] == -1) {
                    echo("Anonymous");
                } else {
                    echo("Invalid User");
                }
            ?></span>
            <span class="date">Uploaded on <?php
                echo($paste_result["publish"])
            ?> CEST</span>
        </div>
    <?php
} else {
    ?>
        <pre><code class="plaintext">This paste was not found.</code></pre>
    <?php
}
?>