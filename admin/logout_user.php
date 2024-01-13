<?php
session_start();
include("includes/config.php");
$_SESSION['login1']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="login-author.php";
</script>
