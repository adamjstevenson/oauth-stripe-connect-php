# A simple Stripe Connect PHP demo app

This is a simple Stripe Connect application written in PHP. At this point it doesn't do a whole lot, and the intention is primarily to provide a general example to help you get up and running with [Stripe Connect](https://stripe.com/docs/connect). You can find a running demo of this application running at
[https://connect.fff.red/](https://connect.fff.red/). This example uses test credentials, so this platform will only be able to access test data when you connect your account.

## Some important things you should know right off the bat

* <strong>This isn't, by any means, ready for production.</strong>
* <strong>You should read over [Stripe's Connect documentation](https://stripe.com/docs/connect/standalone-accounts) as a first step.</strong>
* In the interest of creating an example that is useful and readable for the greatest number of people, no framework was used. If you're planning to create a srs bizness app of any complexity, you'll likely want to use some framework like Laravel. 
* This application uses an OAuth 2.0 client library provided by the [PHP League](https://github.com/thephpleague/oauth2-client). Though [it's possible](https://stripe.com/docs/connect/standalone-accounts#sample-code) to build the OAuth flow out yourself, it's recommended that you use an OAuth library like this one.
* Since the goal here is just to show the connection process, this application doesn't make use of any database. IRL, you'll want to save at least the account ID to your database when your user connects so you can [do things on their behalf](https://stripe.com/docs/connect/authentication#authentication-via-the-stripe-account-header) later.
* This integration uses [standalone accounts](https://stripe.com/docs/connect/standalone-accounts), so you can either create a new test account using [some test data](https://stripe.com/docs/testing), or connect an existing account. 

## Getting started

Clone this repository:

```
git clone https://github.com/adamjstevenson/oauth-stripe-connect-php.git
```

Log in to your Stripe account (or [create one](https://dashboard.stripe.com/register)) and [register your application](https://dashboard.stripe.com/account/applications/settings) as a platform. Set a redirect URI in Stripe that points to https://yoursite.com/connected.php. 

**Note:** This project includes a Vagrantfile and a bootstrap.sh file to provision a server that's ready to go for this application and will run locally by default on 12.12.12.12 (covered in more detail below). If you choose this option, you'll want to set the redirect URI to http://12.12.12.12/connected.php. 

Add your [test secret key](https://dashboard.stripe.com/account/apikeys), [development client ID](https://dashboard.stripe.com/account/applications/settings), and redirect URL to the config/config.php file. 

Run `composer install` from the project's root directory to install dependencies.

## Testing locally with Vagrant

This repo contains a Vagrantfile and bootstrap.sh file to provision a local development environment and get this app up and running easily. To use this, you'll want to:

1. Ensure you've [installed Vagrant](http://www.vagrantup.com/downloads.html).
2. From the project's root directory, run `vagrant up`. The bootstrap file should provision the machine and install everything that's needed to run this application. This might take a while the first time. 
3. Load http://12.12.12.12 (or whatever IP you defined as the local network in your Vagrantfile) in your browser. You should see the index page for this app with a button to "connect to Stripe".
4. Fill out the account application with [some test data](https://stripe.com/docs/testing), connect an existing Stripe account if you have one, or just click the "skip this account form" link at the top to connect with a test-only account. 
5. You'll be redirected back to the redirect URL you defined in your Stripe account (your local Vagrant instance) and some information about your account will be displayed. Hooray!
