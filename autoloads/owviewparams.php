<?php

class owviewparams
{
    /*!
     Constructor
    */
    function owviewparams()
    {
        $this->Operators = array( 
									'createUrl'
        );
    }

    /*!
     Returns the operators in this class.
    */
    function &operatorList()
    {
        return $this->Operators;
    }

    /*!
     \return true to tell the template engine that the parameter list
    exists per operator type, this is needed for operator classes
    that have multiple operators.
    */
    function namedParameterPerOperator()
    {
        return true;
    }

    /*!
     Both operators have one parameter.
     See eZTemplateOperator::namedParameterList()
    */
    function namedParameterList()
    {

		return array( 																  
						'createUrl' => array( 'view_parameters' => array( 'type' => 'array',
                                                                  'required' => true,
                                                                  'default' => array()),
												'params' => array( 'type' => 'array',
                                                                  'required' => true,
                                                                  'default' => array() )
											)
						
				  );
    }

    /*!
     \Executes the needed operator(s).
     \Checks operator names, and calls the appropriate functions.
    */
    function modify( &$tpl, &$operatorName, &$operatorParameters, &$rootNamespace,
                     &$currentNamespace, &$operatorValue, &$namedParameters )
    {
        switch ( $operatorName )
        {

			case 'createUrl':
				$output = $operatorValue; 
				$keys=array();
				
				$modify=isset($namedParameters['params']['modify'])?$namedParameters['params']['modify']:array();
				$exclude=isset($namedParameters['params']['exclude'])?$namedParameters['params']['exclude']:array();
				$only=isset($namedParameters['params']['only'])?$namedParameters['params']['only']:array();
				
				if(count($modify)>0) {
					foreach ($modify as $key => $value) {
						$output .= '/('.$key.')/'.$value;
						$keys[]=$key;
					}
				}
				if(count($namedParameters['view_parameters'])>0) {
					foreach ($namedParameters['view_parameters'] as $key => $value) {
						if (!(in_array($key, $exclude) || $value==='' || $value===null || $value===false || in_array($key, $keys) || ($value && count($only) && !in_array($key, $only)) ))
							$output .= '/('.$key.')/'.$value;
					}
				}
				
				eZURI::transformURI( $output );
				$output = str_replace('//', '/', $output);
				$operatorValue = $output;
			break;
			
    	}
    }


    /// \privatesection
    var $Operators;
}

?>