<?php

class StopsInArea 
{
	private static $_uri = "center_coordinate=%s&limit=%s&diameter=%s&request=stops_area";
	private $_centerCoordinate; //Coordinates separated by comma (e.g. <"x,y">)
	private $_limit; //Limit the amount of stops.
	private $_diameter; //Length of the side of the square. default 1500, max 5000.
	
	function __construct($centerCoordinate, $limit = null, $diameter = null) {
		if (empty($centerCoordinate) || ! is_string($centerCoordinate)) 
			throw new InvalidArgumentException("Centercoordinate x,y required.");	
		
		$this->_centerCoordinate = $centerCoordinate;
		$this->_limit = $limit;
		$this->_diameter = $diameter;
	}
	
	public function getUriStopsInArea() {
		return sprintf(self::$_uri,$this->_centerCoordinate,$this->_limit, $this->_diameter);
	}
}
