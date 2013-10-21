<?php
class GoogleMapsGeoCoding {

	private $geocodeAPIUrl = 'http://maps.googleapis.com/maps/api/geocode/';
	private $responseFormat = 'xml'; // 'xml' or 'json'
	private $sensor = 'false';

	private function getURL($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$tmp = curl_exec($ch);
		curl_close($ch);
		if ($tmp != false){
			return $tmp;
		}
		return false;
	}

	public function getCoordinates($params){

		$address = urlencode(trim($params['address']));
		$town = urlencode(trim($params['town']));
		$postal_code = urlencode(trim($params['postal_code']));
		$country = urlencode(trim($params['country']));

		//if any of params above is missing, it will be replaced by empty string.
		$data = $address . '+' . $postal_code . '+' . $town . '+' . $country;
		
		$url = $this->geocodeAPIUrl.$this->responseFormat.'?sensor='.$this->sensor.'&address='.$data;
		
		$data = $this->getURL($url);
		if ($data) {
			$xml = new SimpleXMLElement($data);
			$requestCode = $xml->status;
			if ($requestCode == 'OK'){
				$result = $xml->result;
				$latitude = $result->geometry->location->lat->__toString();
				$longitude = $result->geometry->location->lng->__toString();
				return array('latitude' => $latitude, 'longitude' => $longitude);
			}
		}

		return array('latitude' => false, 'longitude' => false);
	}

};
?>
