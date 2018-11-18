<?php

# Flag: [REDACTED]

$regex = '/^https:\/\/github\.com\/[a-zA-Z0-9-]+\/[a-zA-Z0-9-]+$/';

if(!isset($_GET['repo'])) {
	return;
}

$repo = $_GET['repo'];

if (!preg_match($regex , $repo)) {
	return;
}

$output = './writable/' . md5($repo);

$cmd = 'timeout 10s git clone ' . $repo . ' ' . $output;

shell_exec($cmd);

echo '<code style=display:block;white-space:pre-wrap>';
echo shell_exec('(cd ' . $output . ' && find . -iname \*.php -exec php -l {} \;)');
echo '</code>';

shell_exec('rm -r ' . $output);

?>
