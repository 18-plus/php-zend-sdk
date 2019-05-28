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

        $gate = new AgeGate($baseUrl);
        $gate->setTitle($config['agegate_title'] ?? '');
        $gate->setLogo($config['agegate_logo'] ?? '');
        
        $gate->setSiteName($config['agegate_site_name'] ?? '');
        $gate->setCustomText($config['agegate_custom_text'] ?? '');
        $gate->setCustomLocation($config['agegate_custom_text_location'] ?? '');
        
        $gate->setBackgroundColor($config['agegate_background_color'] ?? '');
        $gate->setTextColor($config['agegate_text_color'] ?? '');
        
        $gate->setRemoveReference($config['agegate_remove_reference'] ?? '');
        $gate->setRemoveVisiting($config['agegate_remove_visiting'] ?? '');
        
        $gate->setTestMode($config['agegate_test_mode'] ?? '');
        $gate->setTestAnyIp($config['agegate_test_anyip'] ?? '');
        $gate->setTestIp($config['agegate_test_ip'] ?? '');
        
        $gate->setStartFrom($config['agegate_start_from'] ?? '');
        
        $gate->setDesktopSessionLifetime($config['agegate_desktop_session_lifetime'] ?? '');
        $gate->setMobileSessionLifetime($config['agegate_mobile_session_lifetime'] ?? '');
        
        $gate->run();
    }
}