<?php
namespace Ginsen\IpInfoBundle\Test;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class FunctionalTest
 * @package Ginsen\IpInfoBundle\Test
 */
class FunctionalTest extends \PHPUnit_Framework_TestCase
{

    /** @var  TestKernel */
    private $kernel;

    /** @var  Filesystem */
    private $filesystem;


    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->kernel = new TestKernel(uniqid(), false);
        $this->filesystem = new Filesystem();

        $this->filesystem->mkdir($this->kernel->getCacheDir());
    }


    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->filesystem->remove($this->kernel->getCacheDir());
    }


    /**
     * Test without config set
     */
    public function testServicesWithoutConfig()
    {
        $this->kernel->setConfigurationFilename(__DIR__.'/fixtures/config/out_of_the_box.yml');
        $this->kernel->boot();

        /** @var Container $container */
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->has('ginsen.ip_info.manager'), 'The ip_info service is available.');

        $ipInfoManager = $container->get('ginsen.ip_info.manager');
        $this->assertInstanceOf('Ginsen\IpInfoBundle\Service\IpinfoManager', $ipInfoManager);
    }


    /**
     * Test with config and token empty
     */
    public function testServicesWithTokenEmpty()
    {
        $this->kernel->setConfigurationFilename(__DIR__.'/fixtures/config/token_empty.yml');
        $this->kernel->boot();

        /** @var Container $container */
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->has('ginsen.ip_info.manager'), 'The ip_info service is available.');

        $ipInfoManager = $container->get('ginsen.ip_info.manager');
        $this->assertInstanceOf('Ginsen\IpInfoBundle\Service\IpinfoManager', $ipInfoManager);
    }


    /**
     * Test with config and token set
     */
    public function testServicesWithTokenSet()
    {
        $this->kernel->setConfigurationFilename(__DIR__.'/fixtures/config/token_set.yml');
        $this->kernel->boot();

        /** @var Container $container */
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->has('ginsen.ip_info.manager'), 'The ip_info service is available.');

        $ipInfoManager = $container->get('ginsen.ip_info.manager');
        $this->assertInstanceOf('Ginsen\IpInfoBundle\Service\IpinfoManager', $ipInfoManager);
    }
}
