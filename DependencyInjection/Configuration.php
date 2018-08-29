<?php
namespace WebMI\BraintreeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('web_mi_braintree');

        $rootNode
            ->children()
                ->arrayNode('gateway')
                    ->children()
                        ->scalarNode('environment')->end()
                        ->scalarNode('merchantId')->end()
                        ->scalarNode('publicKey')->end()
                        ->scalarNode('privateKey')->end()
                    ->end()
                ->end() // gateway
            ->end()
        ;

        return $treeBuilder;
    }
}