# Bagisto PWA

### 1. Introduction:

PWA or Progressive Web Application uses web browser capabilities and provides a mobile app experience to the users.
It develops from a browser tab and makes pages more immersive with a low friction user experience.
It is a web technology of making a website which acts and feels like an application.
A user can launch the Progressive Web Application same like a native application regardless of browser choice.

It packs with lots of demanding features that allows your business to scale in no time:

* Separate micro site.
* More user friendly than a web application.
* Works lightning fast if compared to the website.
* Completely responsive on all the platforms.
* Launches without the internet or low-quality internet.
* Looks and feels like a native application.
* Users do not need to update progressive web application.
* No app store require managing the application.
* Increases user engagement on the store.
* Increases the store revenue due to user engagement.
* Admin can enter the application name.
* Admin can upload and change the application icon.
* Admin can set the splash background color of the Progressive Web Application.
* Admin can set the theme color of the Progressive Web Application.


### 2. Requirements:

* **Bagisto**: v2.1.2
* **Bagisto Rest API**: v2.1
* **Bagisto PWA**: v2.1.2


### 3. Installation:
* Note: Make sure Bagisto Rest API v2.1 and Bagisto PWA v2.1.2 installed and configured. If not then install and confiure using the following link.

```
Bagisto Rest API: https://github.com/bagisto/rest-api
Bagisto PWA: https://github.com/bagisto/laravel-pwa
```

* Installation

```
Unzip the respective extension zip and then merge "packages" folders into project root directory.
```

* Goto composer.json file and add following line under 'psr-4'.

```
"Webkul\\EnclavePwa\\": "packages/Webkul/EnclavesPwa/src"
```

* Goto config/app.php file and add following line under 'providers'.

```
Webkul\EnclavePwa\Providers\EnclavePwaServiceProvider::class
```

* Run these commands below to complete the setup

```
composer dump-autoload
```

```
php artisan optimize:cache
```

```
php artisan vendor:publish --provider="Webkul\EnclavePwa\Providers\EnclavePwaServiceProvider" --force
```

```
php artisan db:seed --class=Webkul\\EnclavePwa\\Database\\Seeders\\DatabaseSeeder
```
> That's it, now go to https://yourdomain/mobile
