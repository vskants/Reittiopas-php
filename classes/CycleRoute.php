<?php

class CycleRoute
{
	private static $_uri = "request=cycling&from=%s&to=%s&via=%s&profile=%s";
	private $_from; //Coordinates separated by comma (e.g. <"x,y">)
	private $_to; //Coordinates separated by comma (e.g. <"x,y">)
	private $_viaPoints = array(); //Coordinates separated by comma (e.g. <"x,y">)
	private $_profile; //String
	
	function __construct($from, $to, $via = null, $profile = null) {
		if (empty($from) || ! is_string($from) || empty($to) || ! is_string($to))
			throw new InvalidArgumentException("Params from,to required.");
		
		$this->_from = $from;
		$this->_to = $to;
		$this->_viaPoints = $via;
		$this->_profile = $profile;
	}
	
	public function getUriCycleRoute() {
		return sprintf(self::$_uri, $this->_from, $this->_to, implode("|",$this->_viaPoints), $this->_profile);
	}
	
	public function addViaPoint($xyCoordinate) {
		$this->_viaPoints[] = $xyCoordinate;
	}
	
}