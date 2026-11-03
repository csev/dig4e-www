<?php
if ( ! isset($OUTPUT) || ! is_object($OUTPUT) ) {
    http_response_code(404);
    exit;
}

$year = date('Y');
$foot = '
<p style="font-size: 0.875rem; margin-top: 5em;">
<a href="'.$CFG->apphome.'/about">About</a> |
<a href="'.$CFG->wwwroot.'/catalog">Course catalog</a> |
<a href="'.$CFG->apphome.'/privacy">Privacy Policy</a><br/>
<a href="mailto:info@dig4e.com">info@dig4e.com</a><br/>
&copy; '.$year.' Dig4E. Digitization for Everybody.
</p>';

$OUTPUT->setAppFooter($foot);
$OUTPUT->footer();
