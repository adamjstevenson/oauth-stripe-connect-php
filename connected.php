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
        <h2 class="page-header">About your account</h2>
        <div class="panel panel-default shadow-sm">
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt><i class="fa fa-cc-stripe"></i> Account ID</dt>
              <dd><?= $account->id; ?></dd>

              <dt><i class="fa fa-envelope"></i> Email</dt>
              <dd><?= $account->email; ?></dd>

              <dt><i class="fa fa-briefcase"></i> Business Name</dt>
              <dd><?= $account->business_name; ?></dd>

              <dt><i class="fa fa-globe"></i> Country</dt>
              <dd><?= $account->country; ?></dd>

              <dt><i class="fa fa-usd"></i> Default Currency</dt>
              <dd><?= $account->default_currency; ?></dd>

              <dt><i class="fa fa-briefcase"></i> Display Name</dt>
              <dd><?= $account->display_name; ?></dd>

              <dt><i class="fa fa-file-text"></i> Statement Descriptor</dt>
              <dd><?= $account->statement_descriptor; ?></dd>

              <dt><i class="fa fa-question-circle"></i> Charges Enabled</dt>
              <dd><?= $account->charges_enabled ? 'True' : 'False'; ?></dd>

              <dt><i class="fa fa-question-circle"></i> Transfers Enabled</dt>
              <dd><?= $account->transfers_enabled ? 'True' : 'False'; ?></dd>

              <dt><i class="fa fa-link"></i> Website</dt>
              <dd><?= $account->business_url; ?></dd>
            </dl>
          </div>
        </div>
      <?php endif ?>
      
    </div>

    <?php require_once("views/site/footer.php"); ?>
    
  </body>
</html>