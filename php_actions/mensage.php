<?php 
session_start();
if(isset($_SESSION['mensage'])){ ?>
  
  <script>
      window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensage']; ?>'});
      };
      
      $(document).ready(function() {
    $('select').material_select();
  </script>

<?php
}
session_unset();
?>