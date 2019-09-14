<?php
# Pasty Config

# The title of the page.
$title = "pasty";

# The path of your page. If your website is e.g. pasty.me.tld, make it "/". If your website is me.tld/something/pasty, make it "/something/pasty" with a slash at the beginning, but none at the ned.
$path = "/";

# Your DB Connection
$db_host = "localhost";
$db_database = "pasty";
$db_username = "dontUseRootPlease";
$db_password = "useASafePasswordHere";

# Enable Hash Creator - Use /hash/?pw=YourPWHere to create a password hash for the database. This will be removed once user creation is implemented
$enable_hash_creator = false;












# Do not change anything below.
$configv = "0.2";