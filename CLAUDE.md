# Careers app

Job listing app (Laravel 12, Blade, Tailwind 3, Vite 5, SQLite). Continuation of the Laracasts "30 Days to Learn Laravel" final project. Meant to be cloned and run locally by anyone; the public demo is https://careers.mehdimekouar.com.

## Commands

- Setup: `composer install`, `npm install`, copy `.env.example` to `.env`, `php artisan key:generate`, `php artisan migrate` (answers "yes" to create `database/database.sqlite`), optional `php artisan db:seed`.
- Run: `npm run dev` + `php artisan serve` (http://localhost:8000). `npm run build` for production assets.
- Tests: `php artisan test --testsuite=Unit`. Plain `php artisan test` stops because `phpunit.xml` lists a `tests/Feature` folder that doesn't exist. The "can have tags" test in `tests/Unit/JobTest.php` already fails; don't treat it as a regression.
- Code style: `vendor/bin/pint`.

## Things that aren't obvious from the code

- **Admin account** (`admin@example.com` / `password`) is inserted by the users migration (`0001_01_01_000000_create_users_table.php`), not by the seeder. Admin rights come from `users.is_admin`, checked in the policies (`app/Policies`) and in `components/layout.blade.php`.
- **Table names:** job listings use the `jobs` table. Laravel's queue tables were renamed to `queued_jobs`, `queued_job_batches` and `queued_failed_jobs` (see `config/queue.php`) to avoid the clash. Tags link to jobs through `job_tag` (`JobTag` model).
- **Logos:** the `local` and `public` disks both point to `storage/app/public`. Logos live in `storage/app/public/logos` and are served by the `/storage/logos/{filename}` route (`FileController`), so `php artisan storage:link` is not needed.
- **Seeding and tests need internet:** `EmployerFactory` downloads each logo as an SVG from placehold.co (10 retries, then throws "Unable to download a logo.").
- **Mass assignment is off:** `Model::unguard()` in `AppServiceProvider`.
- **Missing records:** routes use `->missing(fn () => response()->view('no-results'))`, and the fallback route shows the same view, instead of 404 pages.
- **Mail:** `.env.example` uses `MAIL_MAILER=log`, so password reset links end up in `storage/logs/laravel.log`.
- **Dark mode:** Tailwind `darkMode: 'selector'`; the `dark` class and `localStorage.theme` are handled by an inline script in `layout.blade.php` and by `resources/js/app.js`. No Alpine.js or Livewire.

## Dependencies

- `composer.json` requires PHP `^8.2`; the app is tested on PHP 8.4. Keep `composer.lock` installable on PHP 8.2: before `composer update`, run `composer config platform.php 8.2.0`, then remove that setting again (`composer config --unset platform`) and run `composer update --lock`. Check with `composer check-platform-reqs --lock` and `composer audit`.

## Deploy

No CI or deploy workflow, on purpose (the repository is for cloning). The demo server is updated by hand with `git pull`, then `composer install` and `npm run build` when dependencies or front-end files change. Don't add a deploy workflow.

## Docs and git

- Update `README.md` in the same change when setup steps, requirements, messages or behaviour change. Use the `readme-writing` skill. Keep Mehdi's own README text as it is, apart from obvious typos.
- Add user-facing changes to `CHANGELOG.md` (Keep a Changelog style, Semantic Versioning; tags are `X.Y.Z` with no `v` prefix). No changelog or release workflow: the repository must stay free of CI files.
- The main branch is `master`. Commit only when asked.
