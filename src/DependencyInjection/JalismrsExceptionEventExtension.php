<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Class JalismrsExceptionEventExtension
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\DependencyInjection
 */
class JalismrsExceptionEventExtension extends
    Extension
{
    /**
     * load
     *
     * @param array                                                   $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     *
     * @throws \Exception
     */
    public function load(
        array $configs,
        ContainerBuilder $container
    ): void {
        $fileLocator = new FileLocator(
            __DIR__.'/../Resources/config'
        );
        
        $yamlFileLoader = new YamlFileLoader(
            $container,
            $fileLocator
        );
    
        $yamlFileLoader->load('services.yaml');
    }
}
