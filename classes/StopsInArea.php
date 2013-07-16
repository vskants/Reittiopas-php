<?php

class StopsInArea 
{
	/**
	 * Module base-url
	 * 
	 * @var stringvvv
	 */
	private static $_uri = "center_coordinate=%s&limit=%s&diameter=%s&request=stops_area";
	
	/**
	 * Coordinates separated by comma (e.g. <"x,y">)
	 * 
	 * @var string
	 */	
	private $_centerCoordinate;
	
	/**
	 * Limit the amount of stops
	 * 
	 * @var string
	 */
	private $_limit;
	
	/**
	 * Length of the side of the square. default 1500, max 5000.
	 * 
	 * @var string
	 */
	private $_diameter;
	
	/**
	 * Constructor, creates StopsInArea-object.
	 * @param string $centerCoordinate
	 * @param string $limit
	 * @param string $diameter
	 * @throws InvalidArgumentException
	 */
	function __construct($centerCoordinate, $limit = null, $diameter = null) {
		if (empty($centerCoordinate) || ! is_string($centerCoordinate)) 
			throw new InvalidArgumentException("Centercoordinate x,y required.");	
		
		$this->_centerCoordinate = $centerCoordinate;
		$this->_limit = $limit;
		$this->_diameter = $diameter;
	}
	
	/**
	 * Format url
	 * 
	 * @return string
	 */
	public function getUriStopsInArea() {
		return sprintf(self::$_uri,$this->_centerCoordinate,$this->_limit, $this->_diameter);
	}
}
