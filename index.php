<?php

use \Tsugi\Controllers\Catalog;

if ( ! defined('COOKIE_SESSION') ) {
    define('COOKIE_SESSION', true);
}

require_once "sanity.php";
require "top.php";
require "nav.php";
?>
<div id="container">
<h1>Digitization for Everybody</h1>
<p>
The primary goal of Dig4E is to bridge the gap between technical standards for
digitization and the practical knowledge required in the cultural heritage sector.
Audio-visual heritage faces real threats from outdated technology and fragile media.
</p>
<p>
This website includes courses on audio, video, and image digitization, which you can
view and join under the <a href="<?= htmlspecialchars($CFG->wwwroot.'/catalog') ?>">catalog</a> link.
The material follows guidelines and standards from the Federal Agencies Digital
Guidelines Initiative (FADGI) and the International Association of Sound and
Audiovisual Archives (IASA).
</p>
<?php if ( ! isset($_SESSION['id']) ) { ?>
<p>
<a href="login">Log in</a> to join a course, track progress, and use the tools in each course.
Please review our <a href="privacy">Privacy Policy</a>.
</p>
<?php } ?>
</div>
<?php
require "foot.php";
