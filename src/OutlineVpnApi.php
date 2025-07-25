<?php

namespace OutlineVpn;

require_once 'GetRegionsOfResidence.php';
require_once 'GetPortType.php';
require_once 'GetLocations.php';
require_once 'GetPlanList.php';
require_once 'CreateAccessKey.php';
require_once 'ListAccessKeys.php';
require_once 'GetAccessKey.php';
require_once 'GetAccessKeyDetails.php';
require_once 'ChangeAccessKeyLocation.php';
require_once 'ChangeAccessKeyPortType.php';
require_once 'ChangeAccessKey.php';
require_once 'GetBalance.php';
require_once 'RevokeAccessKey.php';

class OutlineVpnApi
{
    private $apiUrl;
    private $apiToken;

    public function __construct($apiUrl, $apiToken)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
    }

    public function getRegionsOfResidence()
    {
        $getRegionsOfResidence = new GetRegionsOfResidence($this->apiUrl, $this->apiToken);
        return $getRegionsOfResidence->execute();
    }

    public function getPortType($regionSlug)
    {
        $getPortType = new GetPortType($this->apiUrl, $this->apiToken);
        return $getPortType->execute($regionSlug);
    }

    public function getLocations($regionSlug)
    {
        $getLocations = new GetLocations($this->apiUrl, $this->apiToken);
        return $getLocations->execute($regionSlug);
    }

    public function getPlanList($regionSlug)
    {
        $getPlanList = new GetPlanList($this->apiUrl, $this->apiToken);
        return $getPlanList->execute($regionSlug);
    }

    public function createAccessKey($planId, $regionSlug, $countrySlug, $portType)
    {
        $createAccessKey = new CreateAccessKey($this->apiUrl, $this->apiToken);
        return $createAccessKey->execute($planId, $regionSlug, $countrySlug, $portType);
    }

    public function listAccessKeys()
    {
        $listAccessKeys = new ListAccessKeys($this->apiUrl, $this->apiToken);
        return $listAccessKeys->execute();
    }

    public function getAccessKey($accessKeyName)
    {
        $getAccessKey = new GetAccessKey($this->apiUrl, $this->apiToken);
        return $getAccessKey->execute($accessKeyName);
    }

    public function getAccessKeyDetails($accessKeyName)
    {
        $getAccessKeyDetails = new GetAccessKeyDetails($this->apiUrl, $this->apiToken);
        return $getAccessKeyDetails->execute($accessKeyName);
    }

    public function changeAccessKeyLocation($accessKeyName, $countrySlug, $portType)
    {
        $changeAccessKeyLocation = new ChangeAccessKeyLocation($this->apiUrl, $this->apiToken);
        return $changeAccessKeyLocation->execute($accessKeyName, $countrySlug, $portType);
    }

    public function changeAccessKeyPortType($accessKeyName)
    {
        $changeAccessKeyPortType = new ChangeAccessKeyPortType($this->apiUrl, $this->apiToken);
        return $changeAccessKeyPortType->execute($accessKeyName);
    }

    public function changeAccessKey($accessKeyName)
    {
        $changeAccessKey = new ChangeAccessKey($this->apiUrl, $this->apiToken);
        return $changeAccessKey->execute($accessKeyName);
    }

    public function getBalance()
    {
        $getBalance = new GetBalance($this->apiUrl, $this->apiToken);
        return $getBalance->execute();
    }

    public function revokeAccessKey($accessKeyName)
    {
        $revokeAccessKey = new RevokeAccessKey($this->apiUrl, $this->apiToken);
        return $revokeAccessKey->execute($accessKeyName);
    }
}
