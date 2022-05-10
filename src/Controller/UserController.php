<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\File;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\UserRepository;
/**
 * @Route("/user")
 */
class UserController extends AbstractController
{


    //***********************************Admin start***********************************************************//
    /**
     * @Route("/getListe", name="app_user_index", methods={"GET"})
     */
    public function getC(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager
            ->getRepository(User::class)
            ->findAll();

        return $this->render('Admin/ListeA.html.twig', [
            'users' => $users,
        ]);
    }


    /**
     * @Route("/Admin", name="app_user_indexA", methods={"GET"})
     */
    public function indexA(): Response
    {
        $user = $this->getUser();

        return $this->render('Admin/indexA.html.twig',['user',$user]
        );
    }

    /**
     * @Route("/new", name="app_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request,UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager,MailerInterface $mailer): Response
    {


        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $request->files->get('user')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');

            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $user->setImage($filename);
            $user->setRole(['ROLE_USER']);
            $hash = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($hash);
            $e=$form["email"]->getData();

            $email = (new Email())
                ->from('ferielabdellatif46@gmail.com')
                ->to($e)
                ->subject('🥳 Une nouvelle user est ajouté!')

                ->text('Bien Inscrit 
                
                 Vous etes les bienvenus
                 
                 Vous voulez attendre une email de la part de l admin');

            $mailer->send($email);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Admin/AjoutAdmin.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);




    }


    /**
     * @Route("/user{idUser}", name="app_user_show", methods={"GET"})
     */
    public function show()
    {

        $user = $this->getUser();
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);



    }

    /**
     * @Route("/{idUser}/edit", name="app_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request,   UserPasswordEncoderInterface $encoder,EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image')->getData();
            $filename = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('uploads_directory'),$filename);
            $user->setImage($filename);
            $hash = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($hash);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


    /**


     *@Route("/{idUser}/rem",name="rem_client")
     */

    public function remove(User $user){

        $manager=$this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();
        $repo=$this->getDoctrine()->getRepository(User::class);
        $users=$repo->findAll();
        return $this->redirectToRoute('app_user_index', []);

    }

    //***********************************Admin End***********************************************************//




    //***********************************Client Start***********************************************************//
    /**
     * @Route("/frontC", name="app_user_indexC", methods={"GET"})
     *
     */
    public function indexC(): Response
    {
        return $this->render('Client/indexC.html.twig'
        );
    }




    /**
     * @Route("/newF", name="app_user_new_F", methods={"GET", "POST"})
     */
    public function newF(Request $request,UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('user')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');

            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $user->setImage($filename);
            $user->setRole(['ROLE_USER']);

            $hash = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($hash);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_frontC', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/s/search", name="search")
     */
    public function searchJeux(Request $request, NormalizerInterface $Normalizer, UserRepository $repository): Response
    {

        $requestString = $request->get('searchValue');

        $User = $repository->findByNom($requestString);

        $jsonContent = $Normalizer->normalize($User, 'json', ['Groups' => 'User:read']);
        $retour = json_encode($jsonContent);
        return new Response($retour);
    }


    /**
     * @Route("/{idUser}", name="app_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {

        if ($this->isCsrfTokenValid('delete'.$user->getIdUser(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            $repo=$this->getDoctrine()->getRepository(User::class);
            $user=$repo->findAll();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }


    /**
     * @Route("/profile{idUser}", name="app_user_profile", methods={"GET"})
     */
    public function profiler()
    {

        $user = $this->getUser();
        return $this->render('Client/Profile.html.twig', [
            'user' => $user,
        ]);



    }




    //***********************************Client End***********************************************************//

}

