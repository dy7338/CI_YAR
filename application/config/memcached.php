<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Memcached settings
| -------------------------------------------------------------------------
| Your Memcached servers can be specified below.
|
|	See: https://codeigniter.com/user_guide/libraries/caching.html#memcached
|
*/
$config = array(
	//memcache配置
	'default' => array(
		'hostname' => '127.0.0.1',
		'port'     => '11211',
		'weight'   => '1',
	),
	//memcached配置
	'memd' => array(
		array(	//128测试机 64m
			'192.168.1.128',
			'11212',
			'1'
		),
		array(	//129测试机 64m
			'192.168.1.129',
			'11211',
			'1'
		),
		array(
			'192.168.1.140',
			'11212',
			'1'
		)
	)
);
