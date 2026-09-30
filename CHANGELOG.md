# Changelog

All notable changes to the Careers app are listed here, newest first. Version numbers follow [Semantic Versioning](https://semver.org/): the first number goes up when an update can break your own changes to the app, the second when features are added, the third for fixes.

## [2.0.0] - 2026-09-30

Moves the app to Laravel 12 and PHP 8.4. If you cloned 1.0.0 without changing its code, updating is just `git pull` then `composer install`. The database doesn't change, so there's nothing to migrate. If you did change the code, check it against the [Laravel 12 upgrade guide](https://laravel.com/docs/12.x/upgrade) first, as Laravel 12 is a new major version.

### Security

- Fixes the security advisories reported for every Laravel 11 release, which are only fixed in Laravel 12:
  - CRLF injection in the `email` validation rule (high). The login and register forms use this rule.
  - Path confusion in temporary signed URLs (medium).
  - XSS in the debug error page (low).

### Changed

- Laravel 11.9 to 12.69.
- Test tools: Pest 2 to 3, PHPUnit 10 to 11.
- All other PHP packages updated to their latest versions that still work on PHP 8.2.

### Added

- PHP 8.4 support: the app installs and runs on PHP 8.4 without errors or deprecation warnings. PHP 8.2 is still the minimum.
- README sections for requirements, what each setup step asks and creates, the test logins, where emails go when running locally, and troubleshooting.
- `LICENSE.md` with the MIT license text.

### Removed

- The `/test` route. It sent an email to a fixed address each time someone opened it. Its `PasswordNotification` email class was removed too.
- The GitHub Actions workflow that deployed the demo site. It only worked with the demo server's secrets, and failed on every push in copies of the repository.
- The screenshot at the top of the README.

## [1.0.0] - 2026-09-10

First release. A job listing app built on Laravel 11 (PHP 8.2 or 8.3), with a SQLite database, Blade views, Tailwind CSS and Vite. It continues the Laracasts "Final Project" of the "30 Days to Learn Laravel" course, and adds:

- Dummy company logos downloaded during seeding, and job tag seeding without duplication errors
- Dark and light mode switch
- Sliding menu on mobile
- Search validation
- Admin account that can manage all jobs and accounts, with its own Companies page
- Profile page with editing
- Jobs page listing one company's jobs
- Editing and deleting a company's own listings
- Dot mark in the top right corner of featured listings
- Centered last row of listings
- Pagination on the home, search results and companies pages
- Flash messages after creating, editing or deleting a job or an account
- Password reset
- "Remember me" on login

[2.0.0]: https://github.com/mehdismekouar/careers/compare/1.0.0...2.0.0
[1.0.0]: https://github.com/mehdismekouar/careers/releases/tag/1.0.0
