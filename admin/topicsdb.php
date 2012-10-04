<?php

include('../include/database.php');

function countRec($fname,$tname) {
global $database;
	$sql = "SELECT count($fname) FROM $tname ";
	$result = $database->query($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}	
}

$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

if (!$sortname) $sortname = 'username';
if (!$sortorder) $sortorder = 'desc';

$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$query = $_POST['query'];
$qtype = $_POST['qtype'];

$where = "";
if ($query) $where = " WHERE $qtype LIKE '%$query%' ";
global $database;
$sql = "SELECT top_id,top_title,sub_id FROM topics $where $sort $limit";
$result = $database->query($sql);

$total = countRec("top_id","topics $where");

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "page: $page,\n";
$json .= "total: $total,\n";
$json .= "rows: [";
$rc = false;
while ($row = mysql_fetch_array($result)) {
	if ($rc) $json .= ",";
	$json .= "\n{";
	$json .= "id:'".$row['top_id']."',";
	$json .= "cell:['".$row['top_id']."'";
	$json .= ",'".addslashes($row['top_title'])."'";
	$json .= ",'".$database->getsubname($row['sub_id'])."']";
	$json .= "}";
	$rc = true;		
}
$json .= "]\n";
$json .= "}";
echo $json;
?>
