<?php

class CycleRoute
{
	/**
	 * Module base-url
	 * 
	 * @var string
	 */
	private static $_uri = "request=cycling&from=%s&to=%s&via=%s&profile=%s";
	
	/**
	 * Coordinates separated by comma (e.g. <"x,y">)
	 * 
	 * @var string 
	 */
	private $_from;
	
   /**
	* Coordinates separated by comma (e.g. <"x,y">)
	*
	* @var string
	*/
	private $_to;
	 	
	/**
	 * Coordinates separated by comma (e.g. <"x,y">)
	 *  
	 * @var array
	 */
	private $_viaPoints = array();
	
	/**
	 * Route profile
	 * 
	 * @var string
	 */
	private $_profile;
	
	/**
	 * Constructor, creates CycleRoute-object. 
	 * @param string $from
	 * @param string $to
	 * @param array $via
	 * @param string $profile
	 * @throws InvalidArgumentException
	 */
	function __construct($from, $to, $via = null, $profile = null) {
		if (empty($from) || ! is_string($from) || empty($to) || ! is_string($to))
			throw new InvalidArgumentException("Params from,to required.");
		
		$this->_from = $from;
		$this->_to = $to;
		$this->_viaPoints = $via;
		$this->_profile = $profile;
	}
	
	/**
	 * Format url
	 * 
	 * @return string
	 */
	
	public function getUriCycleRoute() {
		return sprintf(self::$_uri, $this->_from, $this->_to, implode("|",$this->_viaPoints), $this->_profile);
	}
	
	/**
	 * Add via point.
	 * 
	 * @param string $xyCoordinate
	 */
	
	public function addViaPoint($xyCoordinate) {
		$this->_viaPoints[] = $xyCoordinate;
	}
	
}