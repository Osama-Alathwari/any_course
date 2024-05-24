<?php
setcookie("usernameAdmin", "", time() - (60 * 60));
setcookie("passwordAdmin", "", time() - (60 * 60));
setcookie("usernameUser", "", time() - (60 * 60));
setcookie("passwordUser", "", time() - (60 * 60));

header("Location: ./page/index.php");
?>