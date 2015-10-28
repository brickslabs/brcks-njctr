<?php
function setCookieI($cookieName, $cookieValue, $cookieDays, $cookieOnce = 0)
{
	if(isset($_COOKIE[$cookieName]) && $cookieOnce == 1) return;

	$cookieExpiry = time() + (86400 * $cookieDays);
	setcookie($cookieName, $cookieValue, $cookieExpiry, "/");
	$_COOKIE['_gap'] = $cookieValue;
}