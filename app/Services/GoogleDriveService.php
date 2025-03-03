<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;

class GoogleDriveService
{
    /**
     * Create a new class instance.
     */


     protected $client;


    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(config('services.google.client_id'));
        $this->client->setClientSecret(config('services.google.client_secret'));
        $this->client->setRedirectUri(config('services.google.redirect_uri'));
        $this->client->addScope(Drive::DRIVE);
        $this->client->setAccessType('offline');
    }



    public function getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function authenticate($code)
    {
        $this->client->fetchAccessTokenWithAuthCode($code);
        return $this->client->getAccessToken();
    }

    public function listFiles($token)
    {
        $this->client->setAccessToken($token);
        $drive = new Drive($this->client);

        return $drive->files->listFiles()->getFiles();
    }





}
