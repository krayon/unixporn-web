<?php
// Find total number of rows in table
$rowCnt = $conn->query("SELECT COUNT(*) FROM uploads")->fetchColumn();
$total_rows = $rowCnt;
 
// Set rows per page
$rows_per_page = 18;

// Calculate total number of pages
$total_pages = ceil($total_rows / $rows_per_page);
 
// Get current page
$current_page = (isset($_GET['p']) && $_GET['p'] > 0) ? (int) $_GET['p'] : 1;
 
// If current page is greater than last page, set it to last.
if ($current_page > $total_pages)
    $current_page = $total_pages;
 
// Set starting post
$offset = ($current_page - 1) * $rows_per_page;
 
// Get rows from database
$stmt = $conn->query("SELECT * FROM uploads ORDER BY imgDate DESC LIMIT $offset, $rows_per_page");
 
// Print rows
  if (!isset($_POST['query'])) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        $id = $row['id'];
        $imgName = $row['imgName'];
        $imgText = $row['imgText']; 
        $imgDate = $row['imgDate'];
        $imgThumb = $row['imgThumb'];

        echo '<a href="https://nixplorer.org/i/'.$imgName.'" data-title="'.$imgText.' | https://nixplorer.org/i/'.$imgName.'" data-lightbox="latest"><img src="https://nixplorer.org/i/'.$imgThumb.'" class="img-thumbnail" title="'.$imgText.'" alt="image"/></a>';       
}
// Uploads counter
echo '<p class="upcount">' .$total_rows. ' uploads and counting...</p>';

// Build navigation
// Range of pages on each side of current page in navigation
$range = 4;
 echo '<nav class="paginav"><ul class="pagination pagination-sm">';
// Create navigation link for previous and first page.
if ($current_page > 1)
{
    $back = $current_page - 1;
    echo '<li>
      <a href="?p='.$back.'" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';
    if ($current_page > ($range + 1))
        echo '<li><a href="?p=1">1</a></li>';
}
else
    echo '<li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';
 
// Create page links, based on chosen range.
for ($i = $current_page - $range; $i < ($current_page + $range) + 1; $i++)
{
   if ($i > 0 && $i <= $total_pages)
      if ($i == $current_page)
         echo '<li class="active"><a href="?p='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>';
      else
         echo '<li><a href="?p='.$i.'">'.$i.'</a></li>';
}
 
 // Create navigation link for next and last page.
if ($current_page != $total_pages)
{
    $next = $current_page + 1;
    if (($current_page + $range) < $total_pages)
        echo '<li><a href="?p='.$total_pages.'">'.$total_pages.'</a></li> ';
 
    echo '<li>
      <a href="?p='.$next.'" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
}
else
    echo '<li class="disabled">
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
  echo '</ul></nav>';
        
  }
    if (isset($_POST['query'])) {
        // Clean query string for HTML (hquery) and SQL (squery)
        $hquery = htmlspecialchars($_POST['query']);
        $squery = mysql_like_escape($_POST['query']);

        // Prepare and execute query
        $stmt = $conn->prepare("SELECT * FROM uploads WHERE imgText LIKE ? ORDER BY imgDate DESC LIMIT 24");
        $stmt->execute(array($squery . '%'));

    if ($stmt->rowCount() > 0) {
        echo '<h4>Results for: ' . $hquery . '</h4>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $id = $row['id'];
         $imgName = $row['imgName'];
         $imgText = $row['imgText']; 
         $imgDate = $row['imgDate'];
         $imgThumb = $row['imgThumb'];

         echo '<a href="https://nixplorer.org/i/'.$imgName.'" data-title="'.$imgText.' | https://nixplorer.org/i/'.$imgName.'" data-lightbox="latest"><img src="https://nixplorer.org/i/'.$imgThumb.'" class="img-thumbnail" title="'.$imgText.'" alt="image"/></a>';
}
  } 
    else {
       echo '<p>No results for ' . $hquery . '...</p>';
    }
  }
?>
