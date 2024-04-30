<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Specifications:
- PHP version: 8.1.9
- Node version: 18.7.0
- NPM version: 8.15.0

## Run locally
**Note:** I used ***Laragon*** as my development environment.

1. Clone repository and switch to `dev` branch.
2. Set virtual hosts in laragon settings to `{name}.local`.
3. Setup DB in `phpmyadmin`, make sure the DB name matches with the `DB_DATABASE` value in `.env`.
5. Run `composer install` & `npm install` to install dependencies.
6. Run `php artisan key:generate`
7. Run `php artisan migrate --seed` to build DB Schema and populate with sample data.
8. Run `php artisan serve`.
9. Run `npm run dev` to compile resources and enable hot reload.

### Additional Notes
This laravel project still needs to be refactored as this is only my playground for coding, feel free to comment and correct my mistakes or my implementation.

### Screenshots


![login](https://github.com/lasuganob/laravel_refresher_course/assets/166679491/062e85d6-a029-4311-85bc-d7ce7eea61e3)

![admin-post-page](https://github.com/lasuganob/laravel_refresher_course/assets/166679491/afb9dfa8-93d9-44c5-979f-e044910694ed)

![create-post](https://github.com/lasuganob/laravel_refresher_course/assets/166679491/85e2d639-bacd-4435-a9cd-19262e35e899)

![edit-post](https://github.com/lasuganob/laravel_refresher_course/assets/166679491/e6aa3293-1481-44a8-b2a7-7d6ff51edfb2)
