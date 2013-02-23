<?php
/*
 * Requirements: API requires authentication. 
 * 
 * */

class Reittiopas
{
	private static $_baseUrl = 'http://api.reittiopas.fi/hsl/prod/?';
	private $_user;
	private $_pass;
	private $_epsgIn;
	private $_epsgOut;
	private $_format;
	
	function __construct($user, $pass, $epsgIn = null,$epsgOut = null, $format = null) {
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_epsgIn = $epsgIn;
		$this->_epsgOut = $epsgOut;
		$this->_format = $format;
	}
	
	public function getStopsInArea(StopsInArea $stopsArea) {
		$url = $stopsArea->getUriStopsInArea();
		return $this->httpRequest($url);
	}
	
	public function getCycleRoute(CycleRoute $cycleRoute) {
		$url = $cycleRoute->getUriCycleRoute();
		return $this->httpRequest($url);
	}
	
	public function getStopInformation(StopInformation $stopInformation) {
		$url = $stopInformation->getUriStopInformation();
		return $this->httpRequest($url);
	}
	
	public function getRoute(Route $route) {
		$url = $route->getUriRoute();
		return $this->httpRequest($url);
	}
	
	private function buildCommonUrl() {
		return sprintf("&user=%s&pass=%s&epsg_in=%s&epsg_out=%s&format=%s",
		$this->_user, $this->_pass, $this->_epsgIn, $this->_epsgOut, $this->_format);
	}
	
	private function httpRequest($url) {
		$url = self::$_baseUrl.$url.$this->buildCommonUrl();
		echo $url."<br/>";
		$response = file_get_contents($url);
		$response = $this->handleResponse($response);
		return $response;
	}
	
	private function handleResponse($response) {
		if (json_decode($response) != null) {
			return $response;
		}
		else {
			return simplexml_load_string($response);
		}
	}
	
}