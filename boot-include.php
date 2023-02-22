
<?php
header ( "Content-type: text/plain" );
$hostname   = $_REQUEST['hostname'];
$ip         = $_REQUEST['ip'];
$netmask    = $_REQUEST['netmask'];
$gateway    = $_REQUEST['gateway'];
$nameserver = $_REQUEST['nameserver'];
$kickstart  = $_REQUEST['kickstart'];
$prefix     = $_REQUEST['prefix'];
$vlan       = $_REQUEST['vlan'];


$baseurl="http://".$_SERVER['SERVER_NAME'];

$ks = "";
if ( $kickstart != "" ) {
  $ks = 'ks=' .  $baseurl . $kickstart . '?hostname=' . $hostname . '&ip=' . $ip . '&netmask=' . $netmask . '&gateway=' . $gateway . '&nameserver=' . $nameserver;
}

$vlan_config = "";
if ( $vlan != "" ) {
  $vlan_config = 'vlanid=' . $vlan;
}

?>
