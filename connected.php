<?php require_once('oauth/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
  
  <?php require_once("views/site/head.php"); ?>

  <body>

    <?php require_once("views/site/nav.php"); ?>

    <div class="container">
      
      <!-- Display a message to let the user know they're connected -->
      <?php if (isset($success)): ?>
      	<div class="alert alert-success">
      	  <strong><?php echo $success; ?></strong>
      	</div>
      <?php elseif (isset($error)): ?>
      	<div class="alert alert-danger">
      	  <strong><?php echo $error; ?></strong>
      	</div>
      <?php endif ?>

      <!-- Display some info about the account YAY FUN -->
      <?php if (isset($account)): ?>
      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<h2 class="panel-title">
      				About your account
      			</h2>
      		</div>
      		<div class="panel-body">
      			<dl class="dl-horizontal">
      				<dt><i class="fa fa-cc-stripe"></i> Account ID</dt>
      				<dd><?= $account->id; ?></dd>

      				<dt><i class="fa fa-globe"></i> Website</dt>
      				<dd><?= $account->business_url; ?></dd>

      				<dt><i class="fa fa-user"></i> Name</dt>
      				<dd><?= $account->legal_entity->first_name . " " . $account->legal_entity->last_name; ?></dd>

      				<dt><i class="fa fa-briefcase"></i> Display Name</dt>
      				<dd><?= $account->display_name; ?></dd>
      			</dl>

      			<blockquote>
      				<p><?=$account->product_description;?></p>
      			</blockquote>
      		</div>
      	</div>
      <?php endif ?>

    </div>

    <?php require_once("views/site/footer.php"); ?>
    
  </body>
</html>