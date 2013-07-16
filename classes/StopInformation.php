<?php

class StopInformation
{
	/**
	 * Module base-url
	 * ###
	 * @var string
	 */
	private static $_uri = "code=%s&date=%s&time=%s&time_limit=%s&dep_limit=%s&p=%s&request=stop";
	
	/**
	 * Line code
	 * 
	 * @var string
	 */
	private $_code;	
	
	/**
	 * Optional, default current date, YYYYMMDD.
	 * 
	 * @var string
	 */
	private $_date;
	
	/**
	 * Optional, default current time, HHMM.
	 * 
	 * @var string
	 */
	private $_time;
	
	/**
	 * Optional, default 120, max 360 minutes.
	 * 
	 * @var string
	 */
	private $_timeLimit;
	
	/**
	 * Optional, default 10, range 1-20.
	 * 
	 * @var string
	 */
	private $_depLimit;

	/**
	 * Optional, limit fields in response. Defaults to all fields.
	 *
	 * @var string
	 */
	private $_p;

	/**
	 * Constructor, creates StopsInformation-object.
	 * @param string $code
	 * @param string $date
	 * @param string $time
	 * @param string $timeLimit
	 * @param string $depLimit
	 * @param string $p
	 * @throws InvalidArgumentException
	 */
	
	function __construct($code, $date = null, $time = null, $timeLimit = null, $depLimit = null, $p = null) {
		if(empty($code) || ! is_string($code))
			throw new InvalidArgumentException("String code required.");
		
		$this->_code = $code;
		$this->_date = $date;
		$this->_time = $time;
		$this->_timeLimit = $timeLimit;
		$this->_depLimit = $depLimit;
		$this->_p = $p;
	}
	
	/**
	 * Format url
	 * 
	 * @return string
	 */
	public function getUriStopInformation() {
		return sprintf(self::$_uri, $this->_code, $this->_date, $this->_time, $this->_timeLimit, $this->_depLimit, $this->_p);
	}
}
