<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\File;

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
    public function new(Request $request,UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager): Response
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

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Admin/AjoutAdmin.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);




    }


    /**
     * @Route("/{idUser}", name="app_user_show", methods={"GET"})
     */
    public function show(): Response
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
     * @Route("/Client", name="app_user_frontC", methods={"GET"})
     */
    public function fontC(EntityManagerInterface $entityManager): Response
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






    //***********************************Client End***********************************************************//

}

