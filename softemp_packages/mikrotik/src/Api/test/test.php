<?php

require '../vendor/autoload.php';

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Entity\Auth;
use Mikrotik\Api\Commands\IP\Address;
use Mikrotik\Api\Commands\IP\Firewall\FirewallFilter;


$auth = new Auth();
$auth->setHost("189.85.179.130");
$auth->setUsername("floripaserver");
$auth->setPassword("j5/t30/p");
$auth->setDebug(true);


$talker = new Talker($auth);
//$filter = new FirewallFilter($talker);
//$a = $filter->getAll();


$ipaddr = new Address($talker);
$listIP = $ipaddr->getAll();


Mikrotik\Api\Util\DebugDumper::dump($listIP);
