# Facebook App

This facebook app connects to a logged in user's Facebook page and displays posts from it. 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

A step by step series of examples that tell you how to get a development env running

Setup a local Laravel Environment using Homestead and clone this repository.
Run the followings once you've set up your environment

```
php artisan migrate
composer install
```

Create a Facebook Developer app and copy over your credentials to the .env file.
Add the following:

```
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT=
```
Go to Facebook Graph API and authorise your app to allow access user's posts.
Copy the default access token and add the following environment variable
```
FACEBOOK_ACCESS_TOKEN
```
