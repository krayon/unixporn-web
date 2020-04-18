<?php
include_once('inc/db.php'); 

$stmt = 'SELECT * FROM uploads ORDER BY id DESC LIMIT 10';
$query = $conn->prepare($stmt);
$query->execute();
$posts = $query->fetchAll();

$data = '<?xml version="1.0" encoding="UTF-8"?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>' . $site_name . '</title>';
$data .= '<link>//' . $site_url . '</link>';
$data .= '<description>Free GNU/Linux image hosting and screenshot sharing</description>';
    foreach ($posts as $row) {
    $data .= '<item>';
    $data .= '<title>'.$row['imgText'].'</title>';
    $data .= '<link>//' . $site_url . '/i/'.$row['imgName'].'</link>';
    $data .= '<description>'.date("Y-m-d",$row['imgDate']).'</description>';
    $data .= '</item>';
    }
$data .= '</channel>';
$data .= '</rss>';

header('Content-Type: application/xml');
echo $data;
?>