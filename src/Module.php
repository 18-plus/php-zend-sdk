<?php

namespace EighteenPlus\AgeGateZend;

use EighteenPlus\AgeGate\AgeGate;
use Zend\Mvc\MvcEvent;

class Module 
{
    public function onBootstrap(MvcEvent $e) 
    {
        $request = $e->getRequest();
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $baseUrl .= $request->getBaseUrl();
        
        $config = $e->getApplication()->getServiceManager()->get('ApplicationConfig');
        
        $title = isset($config['agegate_title']) ? $config['agegate_title'] : '';
        $testIp = isset($config['agegate_test_ip']) ? $config['agegate_test_ip'] : '';
        $startFrom = isset($config['agegate_start_from']) ? $config['agegate_start_from'] : '';
        
        $gate = new AgeGate($baseUrl);
        $gate->setTitle($title);
        $gate->setTestIp($testIp);
        $gate->setStartFrom($startFrom);
        $gate->run();
    }
}