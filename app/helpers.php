<?php

function d( $data , $status = false )
{
	echo '<pre>' ;
	print_r($data) ;

	if( $status == false )
	{
		exit;
	}
	else
	{
		
	}
	
}

function inputValue(string $key, $data)
{
	return (isset($data[0]->{$key})) ? $data[0]->{$key} : old($key) ;
}