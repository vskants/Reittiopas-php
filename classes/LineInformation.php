<?php

class LineInformation
{
	/**
	 * Module base-url
	 * @var string
	 */
	private static $_uri = "query=%s&type=%s&request=lines";
	
	/**
	 * Line code
	 * @var string
	 */
	private $_query;
	
	/**
	 * Optional, list of transport type ids separated by pipe ("|").
	 * @var string
	 */
	private $_type;
	
	/**
	 * Constructor, creates StopsInformation-object.
	 * @param string $code
	 * @param string $type
	 * @throws InvalidArgumentException
	 */
	function __construct($code, $type = null) {
		if(empty($code) || ! is_string($code))
			throw new InvalidArgumentException("String code required.");
		
		$this->_query = $code;
		$this->_type = $type;
	}
	
	/**
	 * Format url
	 * @return string
	 */
	public function getUriLineInformation() {
		return sprintf(self::$_uri, $this->_query, $this->_type);
	}
}