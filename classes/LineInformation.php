<?php

class LineInformation
{
	/**
	 * 
	 * 
	 * 
	 * Module base-url
	 * @var string
	 */
	private static $_uri = "query=%s&type=%s&request=lines";
	
	/**
	 * Line code
	 * @var string, multiple lines separated by pipe ("|")
	 */
	private $_query;
	
	/**
	 * Optional, list of transport type ids separated by pipe ("|").
	 * @var string
	 */
	private $_type;
	
	/**
	 * Constructor, creates LineInformation-object.
	 * @param string $query
	 * @param string $type
	 * @throws InvalidArgumentException
	 */
	function __construct($query, $type = null) {
		if(empty($query) || ! is_string($query))
			throw new InvalidArgumentException("Query required.");
		
		$this->_query = $query;
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