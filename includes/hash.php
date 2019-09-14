<pre>
<code class="json">
<?php
if(isset($_GET["pw"])) {
    echo('{"success": "true","result":"' . password_hash(htmlspecialchars($_GET["pw"]), PASSWORD_DEFAULT) . '"}');
} else {
    echo('{"success": "false","result":"' . "no password was supplied in URL " . '"}');
}
?>
</code>
</pre