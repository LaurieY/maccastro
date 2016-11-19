<?php
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$pfile = $break[count($break) - 1];
//echo $pfile;
echo "This page was last modified on " .date("d F Y",filemtime($pfile));
?>
