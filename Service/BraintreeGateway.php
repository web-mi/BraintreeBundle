<?php
namespace WebMI\BraintreeBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BraintreeGateway
{
    private $gateway;

    public function __construct(String $environment, String $merchantId, String $publicKey, String $privateKey)
    {
        $this->gateway = new \Braintree_Gateway([
            'environment' => $environment,
            'merchantId' => $merchantId,
            'publicKey' => $publicKey,
            'privateKey' => $privateKey
        ]);

        return $this->gateway;
    }
}