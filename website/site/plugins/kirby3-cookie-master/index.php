<?php

Kirby::plugin('schnti/cookie', [
	'translations' => [
		'en' => [
			'schnti.cookie.text'       => 'This website uses cookies to improve your viewing experience.',
			'schnti.cookie.linkText'   => 'More info on our cookie policy',
			'schnti.cookie.buttonText' => 'Got It!',
		],
		'de' => [
			'schnti.cookie.text'       => 'Diese Website benutzt Cookies, um seinen Lesern das beste Webseiten-Erlebnis zu ermöglichen.',
			'schnti.cookie.linkText'   => 'Mehr Infos',
			'schnti.cookie.buttonText' => 'Ich habe verstanden',
		]
	],
	'snippets'     => [
		'cookie' => __DIR__ . '/snippets/cookie.php'
	]
]);