<?php
session_start();
session_destroy();
?>
<script>
  location.assign("./login.php");
</script>