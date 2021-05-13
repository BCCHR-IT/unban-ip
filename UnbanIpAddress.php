<?php
$unban_ip = new \BCCHR\UnbanIp\UnbanIp();
$success = $unban_ip->unbanIpAddress();

if ($success === TRUE)
{
    header("Location: " . $unban_ip->getUrl("index.php?success=1"));
}
else
{
    $page = new HtmlPage();
    $page->PrintHeaderExt();
    include APP_PATH_VIEWS . 'HomeTabs.php';
    ?>
    <div class="red" style="margin-top:50px; margin-bottom:50px">
        <?php print $success; ?>
    </div>
    <?php
    $unban_ip = new \BCCHR\UnbanIp\UnbanIp();
    $unban_ip->generateIndex();
}