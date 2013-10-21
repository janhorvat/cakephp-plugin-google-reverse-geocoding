<?php
class GeoCodingBehavior extends ModelBehavior {
	
	private $_settings = array();
	
	function setup(Model $model, $settings = array()) {
		$defaults = array(
			'api' => 'google_maps',
			'address_fields' => array('address' => 'address', 'town' => 'town', 'postal_code' => 'postal_code', 'country' => 'country'),
			'coordinate_fields' => array('latitude' => 'latitude', 'longitude' => 'longitude')
		);

		$this->_settings[$model->alias] = Set::merge($defaults, $settings);
	}

	function beforeSave(Model $model) {
		
		$params = array('address' => '', 'town' => '', 'postal_code' => '', 'country' => '');
		$address_fields = $this->_settings[$model->alias]['address_fields'];
		
		if (empty($model->data[$model->alias][$this->_settings[$model->alias]['coordinate_fields']['latitude']]) ||
			empty($model->data[$model->alias][$this->_settings[$model->alias]['coordinate_fields']['longitude']]))
		{
			if (!empty($address_fields['address'])) {
				if (isset($model->data[$model->alias][$address_fields['address']])) {
					$params['address'] = trim($model->data[$model->alias][$address_fields['address']]);
				}
			}
			
			if (!empty($address_fields['town'])) {
				if (isset($model->data[$model->alias][$address_fields['town']])) {
					$params['town'] = trim($model->data[$model->alias][$address_fields['town']]);
				}
			}
			
			if (!empty($address_fields['postal_code'])) {
				if (isset($model->data[$model->alias][$address_fields['postal_code']])) {
					$params['postal_code'] = trim($model->data[$model->alias][$address_fields['postal_code']]);
				}
			}

			if (!empty($address_fields['country'])) {
				if (isset($model->data[$model->alias][$address_fields['country']])) {
					$params['country'] = trim($model->data[$model->alias][$address_fields['country']]);
				}
			}
			
			$api_class = Inflector::camelize($this->_settings[$model->alias]['api']) . 'GeoCoding';
			
			App::uses($api_class, 'Lib/GeoCoding');
			$api = new $api_class;
			$coordinates = $api->getCoordinates($params);
			
			$coordinate_fields = $this->_settings[$model->alias]['coordinate_fields'];
			if (!empty($coordinates['latitude'])) {
				$model->data[$model->alias][$coordinate_fields['latitude']] = $coordinates['latitude'];
			}
			if (!empty($coordinates['longitude'])) {
				$model->data[$model->alias][$coordinate_fields['longitude']] = $coordinates['longitude'];
			}
		}
	}
}
