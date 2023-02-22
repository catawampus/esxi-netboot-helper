<?php
header ( "Content-type: text/plain" );

# dns
$dns_servers = '139.140.9.20,139.140.226.20';

# mkpasswd --method=sha-512
$encpw = 'changeme';

$hostname   = $_REQUEST['hostname'];
$ip         = $_REQUEST['ip'];
$netmask    = $_REQUEST['netmask'];
$gateway    = $_REQUEST['gateway'];
$nameserver = $_REQUEST['nameserver'];

$baseurl="http://".$_SERVER['SERVER_NAME'];

if ( $kickstart != "" ) {
  $ks = 'ks=' .  $baseurl . $kickstart;
} else {
  $ks = "";
}
?>

#Accept the VMware End User License Agreement
vmaccepteula

# root pw
#rootpw --iscrypted <?= $encpw ?> 
rootpw Vmware7!

# keyboard
#keyboard us

# disk
install --firstdisk --overwritevmfs

# network
network --bootproto=static --ip=<?=$ip?> --netmask=<?=$netmask?> --gateway=<?=$gateway?> --hostname=<?=$hostname?> --nameserver=<?=$dns_servers?>

# fixup a few things

reboot

%firstboot --interpreter=busybox

esxcfg-route -a default <?= $gateway ?> 
