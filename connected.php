<?php require_once('oauth/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
  
  <?php require_once("views/site/head.php"); ?>

  <body>

    <?php require_once("views/site/nav.php"); ?>

    <div class="container">
      
      <?php if (isset($success)): ?>
      	<div class="alert alert-success">
      		<strong><?php echo $success; ?></strong>
      	</div>
      <?php elseif (isset($error)): ?>
      	<div class="alert alert-danger">
      		<strong><?php echo $error; ?></strong>
      	</div>
      <?php endif ?>

    </div>

    <?php require_once("views/site/footer.php"); ?>
    
  </body>
</html>