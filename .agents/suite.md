# Dig4E — four-repo suite

## Part of a set of four

This repo is one of four peer Dig4E (Digitization for Everybody) sites. They share a mission and cross-link to one another, but each has its own codebase and deployment.

| Local folder | Production URL | Role |
|---|---|---|
| **`dig4e-www`** | https://www.dig4e.com | Hub — about page plus one Tsugi course catalog |
| `dig4e_imaging` | https://image.dig4e.com | Imaging course (Tsugi/Koseu) |
| `dig4e_audio` | https://audio.dig4e.com | Audio course (Tsugi/Koseu) |
| `dig4e_video` | https://video.dig4e.com | Video course (Tsugi/Koseu) |

All four are **sibling git repos** checked out next to one another (folder names matter; parent path does not):

```
<parent>/
├── dig4e-www/       ← hub + agent docs in .agents/
├── dig4e_audio/
├── dig4e_imaging/
└── dig4e_video/
```

When work touches navigation, lesson links, or cross-site URLs, check the relevant sibling repo.

## Shared agent docs

- Dictation vocabulary: [`vocabulary.md`](vocabulary.md) (in this folder)
- Multi-root workspace: [`workspace.md`](workspace.md)

## Course sites (common pattern)

`dig4e-www` embeds **Tsugi** as the catalog that will hold imaging, audio, and video as manifest courses. It uses `tsugi.php` (full Tsugi, not Koseu) and does not have its own `lessons.json`.

The three course repos also embed **Tsugi** (`tsugi/` is gitignored). Each uses `sanity.php` for install checks, `koseu.php` for LMS routes, and `lessons.json` for content. Site-specific settings live in `tsugi_settings.php`.

Do not edit `tsugi/vendor/` — treat Tsugi as an upstream dependency.
