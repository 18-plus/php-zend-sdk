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
        $title = $config['AGEGATE_TITLE'] ?? '';
        
        $gate = new AgeGate($baseUrl);
        $gate->setTitle($title);
        $gate->run();
    }
}