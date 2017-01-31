<?php


$config['CLOTHESLOOP_HELPDESK_EMAIL']    = 'clothesloop@gmail.com';
$config['CLOTHESLOOP_ROOT_FOLDER']    = 'http://localhost/clothesloop';

/* common yes and no dropdown */
$commonYesAndNoDD = array(
					''	 => '-- Select --',					
					'Y'	 => 'Yes',
					'N'	 => 'No'
                  );
$config['COMMON_YES_NO'] = $commonYesAndNoDD;

/* common yes and no dropdown */
$commonYesAndNoDDWithoutBlank = array(
					'Y'	 => 'Yes',
					'N'	 => 'No'
                  );
$config['COMMON_YES_NO_WITHOUT_BLANK'] = $commonYesAndNoDDWithoutBlank;

/* common yes and no dropdown to map with db and display*/
$commonYesAndNoDDBoolean = array(
					''	 => '-- Select --',					
					'1'	 => 'Yes',
					'0'	 => 'No'
                  );
$config['COMMON_YES_NO_BOOLEAN'] = $commonYesAndNoDDBoolean;

/* Start Date */

$config['START_DATE'] = 'd/m/Y';

$commonKilometer = array(
        ''      => '--- Select Kilometer ---',
        '2km'  => '<2km',
        '4km'  => '<4km',
        '6km'  => '<6km',
        '8km'  => '<8km',
        '10km' => '<10km'
);
$config['COMMON_KILOMETER'] =  $commonKilometer;

$commonKnowAbout = array(
        ''              => '--- Select ---',
        'FF'            => 'Friends & family',
        'OS'            => 'Office Staff',
        'I'             => 'Internet',
        'O'             => 'Other'
);
$config['COMMON_KNOW_ABOUT']    = $commonKnowAbout;


?>