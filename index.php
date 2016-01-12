<!DOCTYPE html>
<html lang="en">
  
  <?php require_once("views/site/head.php"); ?>

  <body>

    <?php require_once("views/site/nav.php"); ?>

    <div class="container">
      <div class="page-header">
        <h1>A Simple Stripe Connect PHP example</h1>
      </div>
      <p class="lead">
        This is a basic Stripe Connect example app built with PHP and an <a href="https://github.com/thephpleague/oauth2-client">OAuth 2.0 client</a>. 
      </p>
      <p class="lead">
        This integration uses <a href="https://stripe.com/docs/connect/standalone-accounts">standalone accounts</a>, so you can either create a new test account using <a href="https://stripe.com/docs/testing">some test data</a>, or connect an existing account (in test mode).
      </p>
      <p>
        <a class="btn btn-primary btn-block btn-xl" data-loading-text="Connecting..." href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_7dsxjCPZ3Ki753aji7elle6doG2Zzp1C&scope=read_write">Connect to Stripe</a>
      </p>
    </div>

    <?php require_once("views/site/footer.php"); ?>
    
    <script>
      $('.btn').on('click', function () {
        var $btn = $(this).button('loading')
      })
    </script>
  </body>
</html>