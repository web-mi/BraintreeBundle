<?php
namespace WebMI\BraintreeBundle\Service;

use Braintree\Gateway;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BraintreeGateway extends Gateway
{
    public function __construct(String $environment, String $merchantId, String $publicKey, String $privateKey)
    {
        parent::__construct([
            'environment' => $environment,
            'merchantId' => $merchantId,
            'publicKey' => $publicKey,
            'privateKey' => $privateKey
        ]);
    }
}