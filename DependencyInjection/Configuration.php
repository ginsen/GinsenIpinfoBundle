<?php

namespace Ginsen\IpInfoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Ginsen\IpInfoBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ginsen_ipinfo');

        $rootNode
            ->children()
                ->scalarNode('token')
                    ->defaultNull()
                    ->info('Token ipinfo.io user service')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
