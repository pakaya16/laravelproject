<?php
return [

	'defaultLanguage' 		=> 'th' ,
	'listTransLang'			=> ['th'],
	
	'cachetime_shorturl'	=> 432000 ,
	'cache'				=> [ 
							'election'			=> '300' ,   //5 minute	
							'queryOther'		=> '1' , //1 minute
							'queryLoadMore'		=> '1' //1 minute
							],

	'upload' 				=> [
								'popup' => [
											'path' 		=> 'upload/popup/',
											'detail' 	=> [
															'80x60'
														],
											'file' 		=> [
															'80x60' => [
																		'size' 		=> '80,59-61',
																		'storage'	=> 1024,
																		'type' 		=> 'jpeg,gif,png'
																		]
													]


											]
							],
	'defultRecord' 			=> 4 ,

	];