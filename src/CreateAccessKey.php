<?php

namespace OutlineVpn;

class CreateAccessKey
{
    private $apiUrl;
    private $apiToken;

    public function __construct($apiUrl, $apiToken)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
    }

    public function execute($planId, $regionSlug, $countrySlug, $portType)
    {
        $url = $this->apiUrl . '/create-access-key';

        $data = [
            'plan_id' => $planId,
            'region_slug' => $regionSlug,
            'country_slug' => $countrySlug,
            'port_type' => $portType,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-OUTLINE-BOT-API-SECRET-TOKEN: ' . $this->apiToken,
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
