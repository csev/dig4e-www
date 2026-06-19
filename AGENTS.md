# Dig4E WWW — Agent Context

## Part of a set of four

This repo is one of four peer Dig4E (Digitization for Everybody) sites. They share a mission and cross-link to one another, but each has its own codebase and deployment.

| Local folder | Production URL | Role |
|---|---|---|
| **`dig4e-www`** (this repo) | https://www.dig4e.com | Hub — marketing, about, lesson index |
| `dig4e_imaging` | https://image.dig4e.com | Imaging course (Tsugi/Koseu) |
| `dig4e_audio` | https://audio.dig4e.com | Audio course (Tsugi/Koseu) |
| `dig4e_video` | https://video.dig4e.com | Video course (Tsugi/Koseu) |

All four are **sibling git repos** checked out next to one another (folder names matter; parent path does not):

```
<parent>/
├── dig4e-www/       ← this repo
├── dig4e_audio/
├── dig4e_imaging/
└── dig4e_video/
```

Open **`dig4e.code-workspace`** in this repo (File → Open Workspace from File…) for a four-root Cursor/VS Code workspace. Paths are relative, so it works on any machine once the siblings are cloned alongside `dig4e-www`.

When work touches navigation, lesson links, or cross-site URLs, check the relevant sibling repo.

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
