<?php
include_once('inc/db.php'); 

$sql = 'SELECT * FROM uploads ORDER BY id DESC LIMIT 10';
$query = $conn->prepare($sql);
$query->execute();
$rs_post = $query->fetchAll();

$data = '<?xml version="1.0" encoding="UTF-8"?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>Nixplorer</title>';
$data .= '<link>https://www.nixplorer.org</link>';
$data .= '<description>Free GNU/Linux image hosting and screenshot sharing</description>';
    foreach ($rs_post as $row) {
    $data .= '<item>';
    $data .= '<title>'.$row['imgText'].'</title>';
    $data .= '<link>https://nixplorer.org/i/'.$row['imgName'].'</link>';
    $data .= '<description>'.date("Y-m-d",$row['imgDate']).'</description>';
    $data .= '</item>';
    }
$data .= '</channel>';
$data .= '</rss>';
 
header('Content-Type: application/xml');
echo $data;
?>