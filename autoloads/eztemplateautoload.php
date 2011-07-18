<?php

// Operator autoloading

$eZTemplateOperatorArray = array();

$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/owviewparams/autoloads/owviewparams.php',
         'class' => 'owviewparams',
         'operator_names' => array( 
									'createUrl'
									),
		 );

?>