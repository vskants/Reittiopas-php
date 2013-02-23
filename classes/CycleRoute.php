<?php

class CycleRoute
{
	private static $_uri = "request=cycling&from=%s&to=%s&via=%s&profile=%s";
	private $_from;
	private $_to;
	private $_viaPoints = array();
	private $_profile;
	
	function __construct($from, $to, $via = null, $profile = null) {
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