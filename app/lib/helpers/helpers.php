<?php

function dd($data){
	echo '<pre>';
		var_dump($data);
	echo '</pre>';
	die();
}

function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function _hash($string){
 	return password_hash($string, PASSWORD_DEFAULT);
}

function check_hash($string, $model){
	return password_verify($string, $model);
}