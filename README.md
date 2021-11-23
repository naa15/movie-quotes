<p align="center"><img src="https://assets3.thrillist.com/v1/image/2827296/828x1500/flatten;scale;webp=auto;jpeg_quality=70" width="400"></p>
<h1 align="center">Movie Quotes</h1>

### Contents:
* [Introduction](#introduction)
* [Prerequisites](#prerequisites)
* [Technical Requirements](#technical-requirements)
* [Database Structure](#database-structure)
* [Getting Started](#getting-started)
* [Migration](#migration)
* [Development](#development)

### Introduction

Movie Quotes is a website where you can browse into website and see random movie quote. Website has two pages, one for movie random quote and one for specific movie quotes. From the landing page(random quote page) there is a link with which you can browse quoutes from the movies from which the random quote is right now showing. Quote has text and image fields, also it is associated with concrete movie. Website has multi-language support: English and Georgian. Admin is able to log into the adminpanel and CRUD quotes and movies.


### Prerequisites
 * PHP@8.0 and up
 * SQLite@3.0 and up
 * composer@2 and up

### Technical Requirements
 * [Laravel@8.x](https://github.com/laravel/laravel) - back-end framework
 * [Spatie Translatable](https://github.com/spatie/laravel-translatable)- package for translation

### Database Structure

![databasePic](https://user-images.githubusercontent.com/48657466/143088648-82a6eec5-e11c-4404-9f54-b4fe4bdf654b.png)

### Getting Started
1\. First of all you need to clone Movie Quotes repository from github:
```sh
git clone https://github.com/RedberryInternship/nanuka-movie-quotes.git
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. Now we need to set our env file. You should provide **.env** file the necessary environment variable:
#
**SQLite:**
>DB_CONNECTION=sqlite

and create database.sqlite file in Database directory


#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```


#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```
You should seed the database with by executing:

```sh
  php artisan db:seed
```

And you should also add new admin user by executing:

```sh
  php artisan make:AdminUser
```
and follow the instructions.

