<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

    }

    #[Route('/contacts', name: 'app_contact')]
    public function index(): Response
    {

        $contacts = $this->em->getRepository(Contact::class)->findAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }

    #[Route('/contacts/create', name: 'app_contact_create')]
    public function create(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($contact);
            $this->em->flush();

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/contacts/edit/{id}', name: 'app_contact_edit')]
    public function edit(Request $request, $id): Response
    {
        $contact = $this->em->getRepository(Contact::class)->find($id);

        $form = $this->createForm(ContactFormType::class, $contact);

        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->flush();

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/edit.html.twig', [
            'form' => $form->createView(),
            'contact' => $contact
        ]);
    } 

    #[Route('/contacts/delete/{id}', name: 'app_contact_delete')]
    public function delete($id): Response
    {
        $contact = $this->em->getRepository(Contact::class)->find($id);

        $this->em->remove($contact);
        $this->em->flush();

        return $this->redirectToRoute('app_contact');
    }
    

    #[Route('/contacts/{id}', name: 'app_contact_show')]
    public function show($id): Response
    {
        $contact = $this->em->getRepository(Contact::class)->find($id);

        return $this->render('contact/show.html.twig', [
            'contact' => $contact
        ]);
    }
}
