# dig4e-www — hub site

## What this repo is

The main public-facing hub for Dig4E. It introduces the program and routes visitors to the three Tsugi-based course sites for lessons and quizzes.

This repo does **not** embed Tsugi. Course content, LTI tools, and quizzes live in the sibling repos.

## Stack

- PHP pages with shared includes: `nav.php`, `foot.php`
- Entry points: `index.php`, `about.php`, `lessons.php`, `privacy.php`
- Bootstrap 5 via CDN
- `archive/` — legacy WordPress-exported HTML (historical reference; not the active site)
- `image/` — remnant imaging lesson HTML from an earlier migration

## Conventions

- Match existing Bootstrap/PHP include patterns
- Nav links to course sites are in `nav.php` and `lessons.php`
- Keep changes minimal and focused
