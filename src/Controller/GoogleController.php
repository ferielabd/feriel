<?php

namespace App\Controller;

class GoogleController extends AbstractController
{

// app/src/Controller/SocialAuthenticationController.php
    /**
     * Link to this controller to start the "connect" process
     * @param ClientRegistry $clientRegistry
     *
     * @Route("/connect/google", name="connect_google_start")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function connectGoogleAction(ClientRegistry $clientRegistry)
    {
        return $clientRegistry
            // ID used in config/packages/knpu_oauth2_client.yaml
            ->getClient('github_main')
            // Request access to scopes
            // https://github.com/thephpleague/oauth2-github
            ->redirect([
                'user:email'
            ])
            ;
    }

    /**
     * After going to Github, you're redirected back here
     * because this is the "redirect_route" you configured
     * in config/packages/knpu_oauth2_client.yaml
     *
     * @param Request $request
     * @param ClientRegistry $clientRegistry
     *
     * @Route("/connect/google/check", name="connect_google_check")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function connectGoogleCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        return $this->redirectToRoute('pages_homepage');
    }
}