# A simple Stripe Connect PHP demo app

This is a simple Stripe Connect application written in PHP. At this point it doesn't do a whole lot, and the intention is primarily to provide a general example to help you get up and running with [Stripe Connect](https://stripe.com/docs/connect). You can find a running demo of this application here:
http://159.203.237.86/

## Some important things you should know right off the bat

* <strong>This isn't, by any means, ready for production.</strong>
* <strong>You should read over [Stripe's Connect documentation](https://stripe.com/docs/connect/standalone-accounts) as a first step.</strong>
* In the interest of creating an example that is useful and readable for the greatest number of people, no framework was used. If you're planning to create a srsbiz app of any complexity, you'll likely want to use some framework like Laravel. 
* This application uses an OAuth 2.0 client library provided by the [PHP League](https://github.com/thephpleague/oauth2-client). Though [it's possible](https://stripe.com/docs/connect/standalone-accounts#sample-code) to build the OAuth flow out yourself, it's recommended that you use an OAuth library like this one.
* Since the goal here is just to show the connection process, this application doesn't make use of any database. IRL, you'll want to save at least the account ID to your database when your user connects so you can [do things on their behalf](https://stripe.com/docs/connect/authentication#authentication-via-the-stripe-account-header) later.
* This integration uses [standalone accounts](https://stripe.com/docs/connect/standalone-accounts), so you can either create a new test account using [some test data](https://stripe.com/docs/testing), or connect an existing account. <strong>This uses test credentials by default, so this platform will only be able to access test data.</strong>


## Getting started

1. Clone this repository:

```
git clone https://github.com/adamjstevenson/oauth-stripe-connect-php.git
```

2. Login to your Stripe account (or create one) and [register your application](https://dashboard.stripe.com/account/applications/settings) as a platform if you haven't already.

3. Add your test secret key and development client ID to the config/config.php file. 

4. Set a redirect URL for your application to point to https://yoursite.com/connected.php. This project includes a Vagrantfile and a bootstrap.sh file to provision a server that's ready to go for this application and will run locally by default on 12.12.12.12 (covered in more detail next). If you choose this option, you'll want to set the redirect URI to http://12.12.12.12/connected.php. 