<?php
namespace Ginsen\IpInfoBundle\Test;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class TestKernel extends Kernel
{
    private $configurationFilename;


    /**
     * Defines the configuration filename
     *
     * @param  string $filename
     */
    public function setConfigurationFilename($filename)
    {
        $this->configurationFilename = $filename;
    }


    /**
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Ginsen\IpInfoBundle\GinsenIpinfoBundle()
        );
    }


    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->configurationFilename);
    }
}
