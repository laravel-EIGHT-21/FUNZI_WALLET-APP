<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Services\GoogleDriveService;
use Google\Client as GoogleClient;
use Google\Service\Drive as GoogleDrive;
use Illuminate\Support\Facades\Session;

class GoogleDriveController extends Controller
{
    


    public function redirectToGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(GoogleDrive::DRIVE);

        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    public function handleGoogleCallback()
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        if (request()->has('code')) {
            $token = $client->fetchAccessTokenWithAuthCode(request('code'));
            Session::put('google_access_token', $token);

            return redirect()->route('drive.files');
        }

        return redirect()->route('login')->with('error', 'Failed to authenticate with Google.');
    }

    public function listFiles()
    {
        $client = new GoogleClient();
        $client->setAccessToken(Session::get('google_access_token'));

        if ($client->isAccessTokenExpired()) {
            // Refresh token logic if needed
        }

        $drive = new GoogleDrive($client);
        $files = $drive->files->listFiles(['fields' => 'files(id, name)']);
        
        return view('students.files.google_files', ['files' => $files->getFiles()]);
    }
    




}
