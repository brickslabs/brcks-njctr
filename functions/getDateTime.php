<?php
function getDateI()
{
	return date("d-m-Y");
}

function getTime()
{
	return date("h:i:s");
}

function getDateTime()
{
	return getDateI()." ".getTime();
}