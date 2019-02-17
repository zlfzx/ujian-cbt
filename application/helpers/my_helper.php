<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function tambah_jam_sql($menit){
	$str = "";
	if ($menit < 60) {
		# code...
		$str = "00:".str_pad($menit, 2, "0", STR_PAD_LEFT).":00";
	}
	else if ($menit > 60) {
		# code...
		$mod = $menit % 60;
		$bg = floor($menit / 60);
		$str = str_pad($bg, 2, "0", STR_PAD_LEFT).":".str_pad($mod, 2, "0", STR_PAD_LEFT).":00";
	}
	return $str;
}