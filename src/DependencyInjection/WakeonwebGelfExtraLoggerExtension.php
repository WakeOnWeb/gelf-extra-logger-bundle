<?php

namespace Wakeonweb\GelfExtraLogger\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * WakeonwebGelfExtraLoggerExtension
 *
 * @uses Extension
 * @author Stephane PY <s.py@wakeonweb.com>
 */
class WakeonwebGelfExtraLoggerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $container->setParameter('wakeonweb.gelf_extra_logger_extra_fields', $config['extra_fields']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));
        $loader->load('processors.xml');
    }
}
