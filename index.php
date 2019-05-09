<?php

$page = new HtmlPage();
$page->PrintHeaderExt();
include APP_PATH_VIEWS . 'HomeTabs.php';

$unban_ip = new \BCCHR\UnbanIp\UnbanIp();
$unban_ip->generateIndex();