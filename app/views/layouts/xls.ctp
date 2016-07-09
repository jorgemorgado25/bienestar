<?php

header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header('Content-Type: text/html; charset=utf-8');
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=\"Report.xls" );
header ("Content-Description: Generated Report" );
?>
<?php echo $content_for_layout ?> 