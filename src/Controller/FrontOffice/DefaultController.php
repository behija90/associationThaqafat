<?php

namespace App\Controller\FrontOffice;

use App\Entity\Contact;
use App\Entity\News;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="front_page_accueil")
     */
    public function accueil()
    {
        $em = $this->getDoctrine()->getManager();
        $derniersNews = $em->getRepository(News::class)->findBy(array(), array('id'=>'desc'), 5, 0);

        return $this->render('frontOffice/default/accueil.html.twig', array(
            'derniersNews'=> $derniersNews
        ));
    }

    /**
     * @Route("/donnees", name="front_page_donnees")
     */
    public function donnees()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('frontOffice/default/donnees2.html.twig');
    }


    /**
     * @Route("/qui-sommes-nous", name="front_apropos")
     */
    public function apropos()
    {
        return new Response('page apropos front');
    }


    /**
     * @Route("/contactez-nous", name="front_contact")
     */
    public function contact(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $this->addFlash('msgSuccess', 'تم إرسال رسالتكم بنجاح');

            return $this->redirectToRoute('front_contact');
        }

        return $this->render('frontOffice/default/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

}