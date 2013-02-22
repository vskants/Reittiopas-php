<?php

class StopInformation
{
	private $_uri = "code=%s&date=%s&time=%s&time_limit=%s&dep_limit=%s&request=stop";
	private $_code;
	private $_date;
	private $_time;
	private $_timeLimit;
	private $_depLimit;
	
	function __construct($code, $date = null, $time = null, $timeLimit = null, $depLimit = null) {
		$this->_code = $code;
		$this->_date = $date;
		$this->_time = $time;
		$this->_timeLimit = $timeLimit;
		$this->_depLimit = $depLimit;
	}
	
	public function getUriStopInformation() {
		return sprintf($this->_uri, $this->_code, $this->_date, $this->_time, $this->_timeLimit, $this->_depLimit);
	}
}