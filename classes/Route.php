<?php

class Route
{
	/**
	 * Module base-url
	 * 
	 * @var string
	 */
	private static $_uri = "request=route&from=%s&to=%s&via=%s&date=%s&time=%s&timetype=%s&zone=%s
			&transport_types=%s&show=%s";
	
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
	 * @var string
	 */
	private $_via;
	
	/**
	 * Date in format YYYYMMDD
	 * 
	 * @var string
	 */	
	private $_date;
	
	/**
	 * Time in format HHMM
	 * 
	 * @var string
	 */
	private $_time;
	
	/**
	 * Time of the request is for "arrival" or "departure". Optional, default "departure"
	 * 
	 * @var string
	 */
	private $_timeType;

	/**
	 * e.g "Helsinki"
	 * 
	 * @var string
	 */
	private $_zone;
	
	/**
	 * Transport types. Optional, default "all", e.g. transport_types=bus|uline|service 
	 * 
	 * @var array
	 */
	private $_transportTypes = array();
	
	/**
	 * Number of routes in the response. Optional, default 3, max 5.
	 * 
	 * @var string
	 */
	private $_show;
	
	
	/**
	 * Constructor, creates Route-object.
	 * @param string $from
	 * @param string $to
	 * @param string $via
	 * @param string $date
	 * @param string $time
	 * @param string $timeType
	 * @param string $zone
	 * @param array $transportTypes
	 * @param string $show
	 * @throws InvalidArgumentException
	 */
	function __construct($from, $to, $via = null, $date = null, $time = null, $timeType = null, $zone = null,
			$transportTypes = null, $show = null) {
		if (empty($from) || ! is_string($from) || empty($to) || ! is_string($to))
			throw new InvalidArgumentException("Params from,to required.");
		
		$this->_from = $from;
		$this->_to = $to;
		$this->_via = $via;
		$this->_date = $date;
		$this->_time = $time;
		$this->_timeType = $timeType;
		$this->_zone = $zone;
		$this->_show = $show;
	}
	
	/**
	 * Format url
	 * 
	 * @return string
	 */
	public function getUriRoute() {
		return sprintf(self::$_uri, $this->_from, $this->_to, $this->_via, $this->_date, $this->_time, $this->_timeType,
				$this->_zone, implode("|",$this->_transportTypes), $this->_show);
	}
	
}