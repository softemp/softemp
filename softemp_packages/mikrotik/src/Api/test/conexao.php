<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 17/09/18
 * Time: 14:34
 */
require '../vendor/autoload.php';

//use Mikrotik\Api\Talker\Talker;
//use Mikrotik\Api\Entity\Auth;
//use Mikrotik\Api\Commands\IP\Address;
use MikrotikAPI\MikrotikAPI;
use MikrotikAPI\Util\DebugDumper;

//$auth = new Auth();
//$auth->setHost("189.85.179.130");
//$auth->setUsername("floripaserver");
//$auth->setPassword("j5/t30/p");
//$auth->setDebug(true);


//$talker = new Talker($auth);
//
//print_r($talker->isData());

$apiMikrotik = new MikrotikAPI('189.85.179.130','floripaserver','j5/t30/p');

//print_r($result->interfaces()->getAll());
$interfaces = $apiMikrotik->interfaces();
print_r($interfaces->ethernet()->getAll()[0]);

DebugDumper::dump($interfaces->ethernet()->getAll());
//$ipaddr = new Address($talker);
//$listIP = $ipaddr->getAll();
//
//
//Mikrotik\Util\DebugDumper::dump($listIP);
