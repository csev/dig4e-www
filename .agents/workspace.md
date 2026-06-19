# Multi-root workspace

Open the four Dig4E repos together in Cursor or VS Code:

**File → Open Workspace from File…** → choose:

```
dig4e-www/.agents/dig4e.code-workspace
```

Or from a terminal (adjust the parent path):

```bash
cursor /path/to/dig4e-www/.agents/dig4e.code-workspace
```

Paths inside the workspace file are relative to its location under `.agents/`, so it works on any machine once all four sibling repos are cloned with the expected folder names.

You should see four roots in the sidebar: Dig4E WWW, Dig4E Audio, Dig4E Imaging, Dig4E Video.
