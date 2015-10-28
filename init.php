<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
include_once 'db.config.php';

$folderName = array('functions', 'classes');
foreach ($folderName as $value) {
	foreach (glob("{$value}/*.php") as $filename)
	{
	    include_once $filename;
	}
}