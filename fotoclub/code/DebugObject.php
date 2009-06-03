<?php

class DebugObject extends Object
{	
	/**
	 * Log Events to FirePHP.
	 *
	 * @param $str The string for the output in the console
	 * @param $enable To enable the console.
	 * @param $instance To use the current consol instance.
	 * @return nothing
	 */
	function LiveDebugMe($str = null, $enable = true, $instance = true)
	{
		$firephp = FirePHP::getInstance($instance);
		$firephp->setEnabled($enable);
		$firephp->log($str);
	}
}
?>