<?php
$unban_ip = new \BCCHR\UnbanIp\UnbanIp();
$success = $unban_ip->unbanIpAddress();

if ($success === TRUE)
{
    $unban_ip->getUrl("index.php");
}
else
{
    $page = new HtmlPage();
    $page->PrintHeaderExt();
    include APP_PATH_VIEWS . 'HomeTabs.php';
    ?>
    <div class="red" style="margin-bottom:20px">
        <?php print $success; ?>
    </div>
    <?php
    $unban_ip = new \BCCHR\UnbanIp\UnbanIp();
    $unban_ip->generateIndex();
}