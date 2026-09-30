# Careers app

Careers is a job listing app based on Laravel. This project is a continuation of the Laracasts "Final Project" of the "30 Days to Learn Laravel" course.

I added the following features:

- Better dummy company logo seeding
- Better job tag seeding to avoid duplication errors
- Switch between dark and light mode
- Mobile sliding menu responsiveness
- Search validation
- Admin user capabilities for all jobs and accounts
- Companies page specific for admin
- Profile page with editing feature
- Jobs page for company specific listings
- Edit/Delete capabilities for company owned listings
- Top right dot mark on featured listings
- Centering of last row listings
- Pagination on home/results/companies pages
- Flash messages after create/edit/delete a job/account
- Password reset feature
- Remember me feature

# Demo

[https://careers.mehdimekouar.com](https://careers.mehdimekouar.com)

# Requirements

| You need | Why |
| --- | --- |
| **PHP 8.2 or newer** | Laravel 12 needs PHP 8.2 or newer. Tested on PHP 8.4. |
| The **pdo_sqlite** PHP extension | The app keeps all its data in one file, `database/database.sqlite` ([SQLite](https://www.sqlite.org/)). Run `php -m` and check that `pdo_sqlite` is in the list. |
| **Composer** | Installs Laravel and the other PHP packages into `vendor/`. |
| **Node.js 18 or newer**, with npm | Runs Vite, the tool that builds and serves the CSS (Tailwind) and JavaScript. |
| Internet access | Only when you add the dummy data: each company logo is downloaded from [placehold.co](https://placehold.co). |

# Usage

Download the files with Git (or as a ZIP from GitHub):
```
git clone https://github.com/mehdismekouar/careers.git
```

After downloading the files, get inside "careers" folder and run the following

### Dependencies
Install Laravel dependencies
```
composer install
```

Install Vite dependencies
```
npm install
```
**Note:** you need to have **node** and **npm** installed

### Configuration
Rename **.env.example** file to **.env**

Generate a Laravel specific app key
```
php artisan key:generate
```

### Database
Create a SQLite database with corresponding tables
```
php artisan migrate
```
**Note:** the first time, Laravel says `The SQLite database configured for this application does not exist` and asks `Would you like to create it?`. Answer **yes**. This step also creates the admin account shown below.

If you want to populate the tables with dummy information
```
php artisan db:seed
```
**Note:** it also downloads dummy company logos so it takes about a minute to complete

It adds 20 companies (each with its own login), 63 job listings (3 of them featured) and up to 20 tags.

### Running the app
Assuming that you are running the app in your local machine without using a 3rd party server

Run Vite server
```
npm run dev
```

Run HTTP server

```
php artisan serve
```
**Note:** your app will be accessible at **localhost:8000**

Admin login: admin@example.com | password

Every company account added by `php artisan db:seed` uses the password `password` too. Their emails are random: log in as admin and open the **Companies** page to see them.

### Emails

Emails are not really sent on your machine. `.env.example` sets `MAIL_MAILER=log`, so each email is written to `storage/logs/laravel.log` instead. To try the password reset, click **Forgot your password?** on the login page, then open that file and copy the link that starts with `http://localhost:8000/reset-password/`.

To send real emails, set `MAIL_MAILER=smtp` and fill in the other `MAIL_` values in `.env` with your mail provider's settings.

# Troubleshooting

| You see | What to do |
| --- | --- |
| `php artisan migrate` says `Database file at path [...database.sqlite] does not exist` | The database file wasn't created, because the command ran with `--no-interaction` or you answered no. Run `php artisan migrate` again and answer **yes**. |
| `php artisan db:seed` stops with `Could not resolve host: placehold.co` or `Unable to download a logo.` | The logos couldn't be downloaded. Check your internet connection, then run `php artisan migrate:fresh --seed`. It empties the database and fills it again from the start (the admin account is created again too). |
| The page shows `Vite manifest not found` | Vite isn't running. Start `npm run dev` in a second terminal, or run `npm run build` once. |

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
