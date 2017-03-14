<?php
$arr1 = [
	19 => [
		'qty' => 1,
		'details' => [
			'id' => 1,
			'name' => 'product 1'
		]
	],
	11 => [
		'qty' => 1,
		'details' => [
			'id' => 2,
			'name' => 'product 2'
		]
	],
];

$arr2 = [
	19 => [
		'qty' => 2,
		'details' => [
			'id' => 1,
			'name' => 'product 1'
		]
	],
	11 => [
		'qty' => 2,
		'details' => [
			'id' => 2,
			'name' => 'product 2'
		]
	],
	12 => [
		'qty' => 4,
		'details' => [
			'id' => 3,
			'name' => 'product 3'
		]
	]
];
echo "<pre>"; print_r(array_replace_recursive($arr1, $arr2));exit;
?>