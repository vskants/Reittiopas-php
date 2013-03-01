<?php

class Route
{
	private static $_uri = "request=route&from=%s&to=%s&via=%s&date=%s&time=%s&timetype=%s&zone=%s
			&transport_types=%s&show=%s";
	private $_from;
	private $_to;
	private $_via; 
	private $_date; //YYYYMMDD
	private $_time; //HHMM
	private $_timeType; //Time of the request is for "arrival" or "departure". Optional, default "departure".
	private $_zone; //"Helsinki"
	private $_transportTypes = array(); //Optional, default "all", e.g. transport_types=bus|uline|service
	private $_show; //Number of routes in the response. Optional, default 3, max 5.
	
	function __construct($from, $to, $via = null, $date = null, $time = null, $timeType = null, $zone = null,
			$transportTypes = null, $show = null) {
		if ((empty($from) || ! is_string($from)) || (empty($to) || ! is_string($to)))
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
	
	public function getUriRoute() {
		return sprintf(self::$_uri, $this->_from, $this->_to, $this->_via, $this->_date, $this->_time, $this->_timeType,
				$this->_zone, implode("|",$this->_transportTypes), $this->_show);
	}
	
}