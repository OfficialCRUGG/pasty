<?php
    if(isset($_POST['paste-input'], $_POST['name-display'], $_POST['lang'])) {
        $content = $_POST['paste-input'];
        if($_POST['name-display'] == "1") {
            $authorDisplay = true;
        } else {
            $authorDisplay = false;
        }
        $lang = $_POST['lang']; 
        
        $validCharacters = "123456789abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ";
        $validCharNumber = strlen($validCharacters);
        $length = 5;
        $result = "";
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber-1);
            $result .= $validCharacters[$index];
        }
        $statement1 = $pdo->prepare("INSERT INTO pastes(id, content, author, lang, displayAuthor) VALUES (:id,:content,:author,:lang,:displayAuthor)");
        $statement1->bindParam("id", $result);
        $statement1->bindParam("content", $content);
        $statement1->bindParam("author", $_SESSION["uId"]);
        $statement1->bindParam("lang", $lang);
        $statement1->bindParam("displayAuthor", $authorDisplay);
        $statement1->execute();
    }
?>

<form action="" method="post" class="create-form">
    <textarea class="paste-input" name="paste-input"></textarea>
    <br>
    <input type="radio" name="name-display" value="1" checked>Show Username as Author</input>
    <br>
    <input type="radio" name="name-display" value="0">Hide Username as Author</input>
    <br>
    <select id="lang" name="lang">
        <option value="plaintext" default>Plain text</option>
        <option value="" disabled>--------------</option>
        <option value="css">CSS</option>
        <option value="javascript">JavaScript</option>
        <option value="python">Python</option>
        <option value="php">PHP</option>
        <option value="json">JSON</option>
        <option value="md">Markdown</option>
        <option value="sql">SQL</option>
        <option value="html">HTML</option>
        <option value="java">Java</option>
        <option value="typescript">TypeScript</option>
        <option value="lua">Lua</option>
        <option value="" disabled>--------------</option>
        <option value="c">C</option>
        <option value="yaml">YAML</option>
        <option value="bash">Bash</option>
        <option value="coffeescript">CoffeeScript</option>
        <option value="makefile">makefile</option>
        <option value="ruby">Ruby</option>
        <option value="csharp">C#</option>
        <option value="perl">Perl</option>
        <option value="cplusplus">C++</option>
        <option value="xml">XML</option>
        <option value="properties">Properties</option>
        <option value="actionscript">ActionScript</option>
        <option value="brainfuck">Brainfuck</option>
        <option value="erlang">Erlang</option>
        <option value="fsharp">F#</option>
        <option value="Gradle">gradle</option>
        <option value="less">Less</option>
        <option value="nsis">NSIS</option>
        <option value="scss">SCSS</option>
        <option value="scala">Scala</option>
        <option value="ahk">AutoHotkey</option>
        <option value="groovy">Groovy</option>
        <option value="handlebars">Handlebars</option>
        <option value="powershell">Powershell</option>
        <option value="vbdotnet">VB.NET</option>
        <option value="kotlin">Kotlin</option>
        <option value="vbscript">VBScript</option>
    </select>
    <button class="create-button" type="submit" name="submit">Create Paste</button>
</form>