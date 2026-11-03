# dig4e-www — hub site

## What this repo is

The main public-facing hub for Dig4E. It introduces the program and hosts one embedded Tsugi instance. Imaging, audio, and video are manifest courses in that instance's course catalog, not separate sites linked from the menu.

## Stack

- Embedded Tsugi (`tsugi/` is gitignored). Check it out with `git clone https://github.com/tsugiproject/tsugi.git tsugi`, then `composer install` inside `tsugi/`
- `tsugi/config.php` — local secrets and database (copy from `tsugi/config-dist.php`; not in git)
- `tsugi_settings.php` — service name, Michigan-blue theme, catalog flags, menu callback
- `buildmenu.php` — hub menu (About, Catalog, login). Course menus come from each course manifest
- `tsugi.php` — front controller for Tsugi routes (`/catalog`, `/courses`, `/login`, …)
- `sanity.php` — install checks before the home page starts a session
- Pages: `index.php` (intro plus the course catalog), `about.php`, `privacy.php`
- `lessons.php` redirects to the catalog
- `archive/` — legacy WordPress-exported HTML (historical reference; not the active site)
- `image/` — remnant imaging lesson HTML from an earlier migration

## Conventions

- Home page features `Catalog::renderListing()`. Do not link the menu back out to image/audio/video.dig4e.com
- Theme primary color is Michigan blue `#00274C`
- Keep the hub menu smaller than DJ4E or WA4E. Course tools (lessons, quizzes) live inside each catalog course
- Do not edit `tsugi/vendor/` — treat Tsugi as an upstream dependency
