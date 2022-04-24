<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
/**
 * @Route("/user")
 */
class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="security_login")
     * @param AuthenticationUtils $utils
     * @return Response
     */
    public function login(Request $request,AuthenticationUtils $utils): Response
    {




        $user = new User();
        $formL = $this->createForm(LoginType::class, $user);
        $formL->handleRequest($request);
        return $this->render('Security/login.html.twig', [
            'last_username' => $utils->getLastUsername(),
            'error' => $utils->getLastAuthenticationError(),
            'formL' => $formL->createView(),
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     * @throws Exception
     */
    public function logout(): void
    {
        throw new Exception('This should never be reached!');
    }
}