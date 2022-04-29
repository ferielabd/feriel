<?php
namespace App\Controller;


use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{



    /**
     *
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager,MailerInterface $mailer): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setMdp(
                $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('mdp')->getData()
                )
            );

            $user->setRole(["ROLE_USER"]);


            $e=$form["email"]->getData();

            $email = (new Email())
                ->from('ferielabdellatif46@gmail.com')
                ->to($e)
                ->subject('🥳 Une nouvelle user est ajouté!')

                ->text('Bien Inscrit . Vous voulez attendre une email de la part de ladmin');

            $mailer->send($email);
            $entityManager->persist($user);
            $entityManager->flush();







            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}