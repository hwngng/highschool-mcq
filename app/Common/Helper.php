<?php 
namespace App\Common;

class Helper
{
	public static function IssetTake ($lhs, $dict, $key)
	{
		if (isset($dict[$key])) {
			return $dict[$key];
		}
		return $lhs;
	}
}