<?php

namespace BCCHR\UnbanIp;

use REDCap;

class UnbanIp extends \ExternalModules\AbstractExternalModule
{
    function __construct()
    {
        parent::__construct();
    }

    public function unbanIpAddress()
    {
        $errors = array();
        $ip = $_POST["ipaddress"];
        if (filter_var($ip, FILTER_VALIDATE_IP))
        {
            $sql = "DELETE FROM redcap_ip_banned WHERE ip ='$ip' LIMIT 1";
            $this->query($sql);
            $rowsAffected = db_affected_rows();
            if ($rowsAffected > 0) 
            {
                REDCap::logEvent("Unbanned IP Address $ip", null, $sql);
                return TRUE;
            }
            else
            {
                return "The IP Address: $ip was not found in the database. Please check your entry";
            }
        }
        else
        {
            return "Please enter a valid IP address";
        }
    }

    public function generateIndex()
    {
        ?>
        <style type="text/css">#pagecontent { margin-top: 70px; }</style>
        <?php if ($_GET["success"] == "1"): ?>
            <div class="green" style="margin-bottom:20px">IP Address unsuspended successfully</div>
        <?php endif; ?>
        <div style="width: 70%; margin: auto;">
            <h2 style="text-align: center">Unban IP Addresses</h2>
            <form action="<?php print $this->getUrl("UnbanIpAddress.php"); ?>" method="post">
                <div class="form-group" style="margin:10px 0 20px 0">
                    <label for="ipaddress">Enter IP Address</label>
                    <input type="type" class="form-control" id="ipaddress" name="ipaddress" required>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        <?php
    }
}