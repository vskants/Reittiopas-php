<?php
/*
 * Requirements: API requires authentication. 
 *++ 
 * */

class Reittiopas
{
	/**
	 * API base-url
	 * 
	 * @var stringb
	 */	
	private static $_baseUrl = 'http://api.reittiopas.fi/hsl/prod/?';
	
	/**
	 * API user
	 * 
	 * @var string
	 */
	private $_user;
	
	/**
	 * API password
	 * 
	 * @var string
	 */
	private $_pass;
	
	/**
	 * Input coordinatesystem
	 * 
	 * @var string
	 */
	private $_epsgIn;
	
	/**
	 * Output coordinatesystem
	 * 
	 * @var string
	 */
	private $_epsgOut;
	
	/**
	 * Output format json/xml/txt
	 * 
	 * @var string
	 */
	private $_format;

	/**
	 * Constructor, creates Reittiopas-object.
	 * @param string $user
	 * @param string $pass
	 * @param string $epsgIn
	 * @param string $epsgOut
	 * @param string $format
	 */
	function __construct($user, $pass, $epsgIn = null,$epsgOut = null, $format = null) {
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_epsgIn = $epsgIn;
		$this->_epsgOut = $epsgOut;
		$this->_format = $format;
	}
	
	/**
	 * Get stops in area.
	 * 
	 * @param StopsInArea $stopsArea
	 * @return void
	 */
	public function getStopsInArea(StopsInArea $stopsArea) {
		$url = $stopsArea->getUriStopsInArea();
		return $this->httpRequest($url);
	}
	
	/**
	 * Get cycleroute.
	 *
	 * @param CycleRoute $cycleRoute
	 * @return void
	 */
	public function getCycleRoute(CycleRoute $cycleRoute) {
		$url = $cycleRoute->getUriCycleRoute();
		return $this->httpRequest($url);
	}
	
	/**
	 * Get stopinformation.
	 * 
	 * @param StopInformation $stopInformation
	 * @return void
	 */
	public function getStopInformation(StopInformation $stopInformation) {
		$url = $stopInformation->getUriStopInformation();
		return $this->httpRequest($url);
	}
	
	/**
	 * Get route.
	 * 
	 * @param Route $route
	 * @return void
	 */
	public function getRoute(Route $route) {
		$url = $route->getUriRoute();
		return $this->httpRequest($url);
	}

	/**
	 * Get line information.
	 *
	 * @param Lines $lines
	 * @return void
	 */
	public function getLineInformation(LineInformation $lines) {
		$url = $lines->getUriLineInformation();
		return $this->httpRequest($url);
	}

	/**
	 * Format url required parameters.
	 * @return string
	 */
	private function buildCommonUrl() {
		return sprintf("&user=%s&pass=%s&epsg_in=%s&epsg_out=%s&format=%s",
		$this->_user, $this->_pass, $this->_epsgIn, $this->_epsgOut, $this->_format);
	}
	
	/**
	 * Execute HTTP-request.
	 * @param string $url
	 * @return void
	 */
	private function httpRequest($url) {
		$url = self::$_baseUrl.$url.$this->buildCommonUrl();
    // Use cURL library if available
    if (function_exists('curl_version')) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      $response = curl_exec($ch);
    }
    else {
      $response = file_get_contents($url);
    }
		$response = $this->handleResponse($response);
		return $response;
	}
	
	/**
	 * Return either json or xml.
	 * 
	 * @param string $response
	 * @return json/xml
	 */
	private function handleResponse($response) {
    return ($this->_format == 'json') ? json_decode($response) : simplexml_load_string($response);
	}
	
}
