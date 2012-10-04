<?php

include('../include/database.php');
global $database;
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

if (!$sortname) $sortname = 'q_id';
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

$sql = "SELECT q_id,q_text,q_op1,q_op2,q_op3,q_op4,q_ans,top_id FROM questions $where $sort $limit";
$result = $database->query($sql);

$total = countRec("q_id","questions $where");

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
	$json .= "id:'".$row['q_id']."',";
	$json .= "cell:['".$row['q_id']."'";
	$json .= ",'".addslashes($row['q_text'])."'";
	$json .= ",'".addslashes($row['q_op1'])."'";
	$json .= ",'".addslashes($row['q_op2'])."'";
	$json .= ",'".addslashes($row['q_op3'])."'";
	$json .= ",'".addslashes($row['q_op4'])."'";
	$json .= ",'".addslashes($row['q_ans'])."'";
	$json .= ",'".$database->gettopicname($row['top_id'])."']";
	$json .= "}";
	$rc = true;		
}
$json .= "]\n";
$json .= "}";
echo $json;
?>
