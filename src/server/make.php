<?php

$phar = new Phar('vtemplate-website.phar');
$phar->buildFromDirectory('.', '/^((?!composer\.).)*$/');
$phar->addFile('bootstrap.php');
