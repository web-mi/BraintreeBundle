<?php
namespace WebMI\BraintreeBundle\DependencyInjection;

use WebMI\BraintreeBundle\Service\BraintreeGateway;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class WebMIBraintreeExtension extends ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.xml');

        $definition = $container->getDefinition(BraintreeGateway::class);
        $definition->replaceArgument('$environment', $mergedConfig['gateway']['environment']);
        $definition->replaceArgument('$merchantId', $mergedConfig['gateway']['merchantId']);
        $definition->replaceArgument('$publicKey', $mergedConfig['gateway']['publicKey']);
        $definition->replaceArgument('$privateKey', $mergedConfig['gateway']['privateKey']);
    }

    public function getAlias()
    {
        return 'web_mi_braintree';
    }
}