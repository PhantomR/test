<?php
echo shell_exec('(cd test && find . -iname \*.php -exec php -l {} \;)');

$var = '..'|
ech shell_exec('(cd test && find . -iname \*.php -exec echo {} \;)');

?>
