<?php

class StopInformation
{
	private static $_uri = "code=%s&date=%s&time=%s&time_limit=%s&dep_limit=%s&request=stop";
	private $_code; //Line code
	private $_date; //Optional, default current date, YYYYMMDD.
	private $_time; //Optional, default current time, HHMM.
	private $_timeLimit; //Optional, default 120, max 360 minutes.
	private $_depLimit; //Optional, default 10, range 1-20.
	
	function __construct($code, $date = null, $time = null, $timeLimit = null, $depLimit = null) {
		if(empty($code) || ! is_string($code))
			throw new InvalidArgumentException("String code required.");
		
		$this->_code = $code;
		$this->_date = $date;
		$this->_time = $time;
		$this->_timeLimit = $timeLimit;
		$this->_depLimit = $depLimit;
	}
	
	public function getUriStopInformation() {
		return sprintf(self::$_uri, $this->_code, $this->_date, $this->_time, $this->_timeLimit, $this->_depLimit);
	}
}