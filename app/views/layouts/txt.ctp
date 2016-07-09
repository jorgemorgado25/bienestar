<?php
	header('Content-disposition: attachment; filename=gen.txt');
	header('Content-type: text/plain');
	echo $content_for_layout;
?>