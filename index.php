<?php 
	require 'vendor/autoload.php';

	$service = new \Ipssi\Service\Container();

	$service->set('logger.formatter', function () {
	    return new \Ipssi\Logger\Formatter\Error();
    });

	$service->set('logger', function ($c) {
        $logger = new \Ipssi\Logger\File('app.log');
        $logger->setFormatter($c->get('logger.formatter'));
        return $logger;
    });

	$logger = $service->get('logger');

	var_dump($logger);

    //$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);

	//$service->get('logger')->emergency();
 