<?php
include('includes/db.php');
/*pageination start*/
$total = "select * from hostel where hostel_type!=3";
$query=mysqli_query($con,$total);
$total=mysqli_num_rows($query);
$limit = 2;
$pages = ceil($total / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
$offset = ($page - 1)  * $limit;
$start = $offset + 1;
$end = min(($offset + $limit), $total);
$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
$stmt1 = 'SELECT * FROM hostel ORDER BY name LIMIT '.$limit.' OFFSET '.$offset
    ;
$stmt=mysqli_query($con,$stmt1);
  if (mysqli_num_rows($stmt) > 0) {
   while($row=mysqli_fetch_array($stmt)){
    $name1=$row['name'];
    echo $name1;
   }}else{
        echo "No result";
    }
    echo '<div id="paging"><p>'. $prevlink. ' Page '. $page. ' of '. $pages. ' pages, displaying '. $start. '-'. $end. ' of '. $total. ' results '.$nextlink. ' </p></div>';
/*pagination end*/
?>