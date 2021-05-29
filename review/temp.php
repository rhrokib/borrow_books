<?php
redirect("./../index.php", "?alert=success");

function redirect($to, $alert){
  ?>
    <script>
      location.assign("<?php echo $to.$alert ?>");
    </script>
  <?php
}
?>