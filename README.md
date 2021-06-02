<p align="center">
<h2>Twitter Core (Experimental Project)</h2>
</p>

### About the project 

Twitter Core is a web application built on the [Laravel](https://laravel.com/) framework as its server side processing engine, and on the [Vue.js](https://vuejs.org/) framework as its client-side page renderer, offering some of the core functionalities of the [Twitter](https://twitter.com) social-network, with the real-time updating interface through the [web-sockets](https://github.com/beyondcode/laravel-websockets) local server, which is a drop-in Pusher replacement with Laravel Echo and SSL support.

### Some of the functionalities it covers are
 - Tweet composing interactive component 
 - The real-time updated timeline, which updates user's tweets, retweets, replies and likes
 - Twitter like character counting indicator, with validation on input
 - Media (image and video) uploading while composing a tweet
 - Twitter like hashtags and mentions
 - Infinite scrolling of tweets

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Installing & Initial Configuration
Install server-side dependencies:
```shell
    $> git clone https://github.com/fidomax07/twitter-core.git
    $> cd into/project/path
    $> composer install
```
Setup the server-side environment file, by copying the provided sample file:
```shell
    $> cp .env.example .env
```
Generate application unique key by running:
```shell
    $> php artisan key:generate 
```
Setup application's database credentials, by filling the below values into the `.env` file:
```shell
    DB_DATABASE=your_database
    DB_USERNAME=your_db_username
    DB_PASSWORD=your_db_password
```
Create the database structure, and seed the initial data into the system:
```shell
    $> php artisan migrate:fresh --seed
```
Install client-side dependencies and build the project:
```shell
    $> npm install
    $> npm run dev
```
Finally, run the local web-sockets server by running:
```shell
    $> php artisan websockets:serve
```
You're ready to go and open the application in your web-browser.