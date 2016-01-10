<!DOCTYPE html>
<html lang="en">
  
  <?php require_once("views/site/head.php"); ?>

  <body>

    <?php require_once("views/site/nav.php"); ?>

    <div class="container">
      <div class="page-header">
        <h1>Simple Stripe Connect PHP</h1>
      </div>
      <p class="lead">
        This is a basic Stripe Connect example built with PHP. Click the button below to connect your Stripe account. 
      </p>
      <p>
        <a class="btn btn-lg btn-block btn-primary" href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_7dsxjCPZ3Ki753aji7elle6doG2Zzp1C&scope=read_write">Connect to Stripe</a>
      </p>
    </div>

    <?php require_once("views/site/footer.php"); ?>
    
  </body>
</html>