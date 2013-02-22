<?php

class StopsInArea 
{
	private $_uri = "center_coordinate=%s&limit=%s&request=stops_area";
	private $_centerCoordinate;
	private $_limit;
	private $_diameter;
	
	function __construct($centerCoordinate, $limit = null, $diameter = null) {
		$this->_centerCoordinate = $centerCoordinate;
		$this->_limit = $limit;
		$this->_diameter = $diameter;
	}
	
	public function getUriStopsInArea() {
		return sprintf($this->_uri,$this->_centerCoordinate,$this->_limit);
	}
}
