## About Project
A simple blog application using Laravel 11 that contain following features:

- Register new user
- User can login with email & password
- User can manage blog posts [add,update,delete].
- Auth user can add comment in any post
- Display all posts in homepage with pagination
- Guest can show all posts
- Post detailed page
- Search posts 

## Requirements
- php ^8.2

## Install dependencies

To serve the project locally, you should follow below steps:

```bash
    1.  git clone https://github.com/magdasaif/blog_system.git
    2.  cd blog_system/
    3.  make sure that you are on magda branch  
    4.  composer install
    5.  cp .env.example .env
    6.  php artisan key:generate
    7.  Creat db and add its credinational in the .env file
    8.  Add mail configuration in the .env file
    9.  php artisan migrate
    10. php artisan serve 
``` 

## Used Packages

For authorization use 
```bash
laravel/ui 
```

For post image use 
```bash
spatie/laravel-medialibrary 
```

For user post comment use 
```bash
beyondcode/laravel-comments 
```