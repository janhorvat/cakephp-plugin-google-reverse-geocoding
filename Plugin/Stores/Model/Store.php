<?php

class Store extends StoresAppModel {
	
	public $name = 'Store';

	// In case you don't want to use parameter in Google maps reverse geocoding, simpy set it to false in array bellow: 'postal_code' => false
	
	public $actsAs = array('GeoCoding' => 
		array(
			'api' => 'google_maps',			
			'address_fields' => array('address' => 'address', 'town' => 'town', 'postal_code' => 'postal_code', 'country' => 'country'),
			'coordinate_fields' => array('latitude' => 'latitude', 'longitude' => 'longitude')
		)
	);

	public $validate = array(
			'name' => array(
				'notempty' => array(
					'rule' => array('notempty')
				),
			),			
			'address' => array(
				'notempty' => array(
					'rule' => array('notempty')
				),
			),
			'postal_code' => array(
				'notempty' => array(
					'rule' => array('notempty')
				),
			),
			'town' => array(
				'notempty' => array(
					'rule' => array('notempty')
				),
			),
			'country' => array(
				'notempty' => array(
					'rule' => array('notempty')
				),
			)
		);

}
