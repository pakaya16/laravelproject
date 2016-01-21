<?php namespace App\Helpers;

class ErrorLib {

	public function __construct()
	{

	}
	public static function TransError( $data = array() )
	{
		$messages = array() ;
		foreach ( $data as $key => $val )
		{
			if ( is_array($val) )
			{
				$messages[$key]				= trans( $val[0] ) . ' ' . trans( $val[1] ) ;
			}
			else
			{
				$messages[$key]				= trans( $val ) ;	
			}
		}
		return $messages ;
	}
	public static function returnAlert( $data = array() )
	{
		echo '<script>parent.alertMsg("'.(!empty($data['title'])?$data['title']:'').'","'.(!empty($data['body'])?$data['body']:'').'",'.(!empty($data['refresh'])?1:0).');</script>';
	}
	public static function checkSyntax( $text )
	{
		return addslashes(strip_tags($text)) ;
	}
}
