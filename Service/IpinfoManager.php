<?php

namespace Ginsen\IpInfoBundle\Service;

use IpInfo\Lib\IpinfoApi;

/**
 * Class IpinfoManager
 * @package Ginsen\IpInfoBundle\Service
 */
class IpinfoManager
{
    /** @var  IpinfoApi */
    protected $ipInfo;


    /**
     * IpinfoManager constructor.
     * @param string $token
     */
    public function __construct($token)
    {
        if ($token === null) {
            $this->ipInfo = new IpinfoApi();
        } else {
            $this->ipInfo = new IpinfoApi(array(IpinfoApi::TOKEN => $token));
        }
    }


    /**
     * @return \IpInfo\Lib\IpinfoResponse
     */
    public function getYourOwnIpDetails()
    {
        return $this->ipInfo->getYourOwnIpDetails();
    }


    /**
     * @param string $ipAddress
     * @return \IpInfo\Lib\IpinfoResponse
     */
    public function getFullIpDetails($ipAddress)
    {
        return $this->ipInfo->getFullIpDetails($ipAddress);
    }


    /**
     * @param string $ipAddress
     * @return \IpInfo\Lib\IpinfoResponse
     */
    public function getIpGeoDetails($ipAddress)
    {
        return $this->ipInfo->getIpGeoDetails($ipAddress);
    }
}
