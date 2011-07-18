-------------------------
owViewParams :
-------------------------
owViewParams is a template operator which help you to manage url and view_parameters.
owViewParams generates a new url with all view_parameters you want to preserve, modify, and remove.

-------------------------
Parameters
-------------------------
$view_parameters : current view parameters

'modify' : used to modify view_parameters values. If a view_parameter doesn't exists, it will be created.
'only' : used to keep only specified view_parameters (added to 'modify' view_parameters)
'exclude' : used to remove specified view_parameters (except 'modify' view_parameters)
	
	
	
-------------------------
Usage
-------------------------

USAGE 1 : 'modify'
-------------------------------------------------------------------
	<a href="{$url|createUrl( $view_parameters,
						hash('modify', hash('param1', 'value1',
											'param2', 'value2')) 
					)}">Test</a>
					
	RETURNS :
	-------------------
	$view_parameters : 	array( )
	result :"$url/(param1)/value1/(param2)/value2"
		
	$view_parameters : 	array( 'param3' => value3 )
	result :"$url/(param1)/value1/(param2)/value2/(param3)/value3"
	


USAGE 2 : 'only'
-------------------------------------------------------------------
	<a href="{$url|createUrl( $view_parameters,
						hash('only', array('param2')) 
					)}">Test</a>

	RETURNS :
	-------------------
	$view_parameters : 	array( 'param1' => value1, 'param2' => value2, 'param3' => value3 )
	result :"$url/(param2)/value2"



USAGE 3 : 'exclude'
-------------------------------------------------------------------
	<a href="{$url|createUrl( $view_parameters, 
						hash('exclude', array('param2')) 
					)}">Test</a>
					
	RETURNS :
	-------------------
	$view_parameters : 	array( 'param1' => value1, 'param2' => value2, 'param3' => value3 )
	result :"$url/(param1)/value1/(param3)/value3"



USAGE 4 : 'modify' + 'only'
-------------------------------------------------------------------
	<a href="{$url|createUrl( $view_parameters,
						hash( 'modify', hash('param1', 'value1',
											 'param4', 'value4'),
							  'only', array('param2') )
					)}">Test</a>

	RETURNS :
	-------------------
	$view_parameters : 	array( 'param1' => value1, 'param2' => value2, 'param3' => value3 )
	result :"$url/(param1)/value1/(param4)/value4/(param2)/value2"



USAGE 5 : 'modify' + 'exclude'
-------------------------------------------------------------------
	<a href="{'/new/url'|createUrl( $view_parameters,
								hash('modify', hash('param1', 'value1',
											'param4', 'value4'),
							 		 'exclude', array('param3') )
					)}">Test</a>
	
	RETURNS :
	-------------------
	$view_parameters : 	array( 'param1' => value1, 'param2' => value2, 'param3' => value3 )
	result :	"/new/url/(param1)/value1/(param4)/value4/(param2)/value2"



---------------------------------------------
Hope you find it useful! 

Simon Boyer

