<?php

class ReverseGeocode
{
	/**
	 * Module base-url
	 * @var string
	 */
	private static $_uri = "coordinate=%s&request=reverse_geocode";
	
	/**
	 * Coordinates
	 * @var string, lat/lon coordinates separated by a comma (",")
	 */
	private $_coordinate;
	
	/**
	 * Constructor, creates LineInformation-object.
	 * @param string $coordinate
	 * @throws InvalidArgumentException
	 */
	function __construct($coordinate) {
		if(empty($coordinate) || ! is_string($coordinate))
			throw new InvalidArgumentException("Coordinate required.");
		
		$this->_coordinate = $coordinate;
	}
	
	/**
	 * Format url
	 * @return string
	 */
	public function getUriReverseGeocode() {
		return sprintf(self::$_uri, $this->_coordinate);
	}
}