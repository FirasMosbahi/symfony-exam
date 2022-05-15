<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use App\Form\PfeType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route('/addPfe', name: 'app_form_pfe')]
    public function index(EntityManagerInterface $entityManager , Request $request , ManagerRegistry $managerRegistry): Response
    {
        $pfe = new Pfe();
        $form = $this->createForm(PfeType::class , $pfe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($pfe);
            $entityManager->flush();
            return $this->redirectToRoute('pfe_info', ['id' => $pfe->getId()]);
        }
        return $this->render('form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/pfeInfo/{id}' ,name:'pfe_info')]
    public function info(Pfe $pfe): Response
    {
        return $this->render('/form/info.html.twig',[
            'name' => $pfe->getTitle(),
            'student' =>$pfe->getStudent(),
            'entreprise' =>$pfe->getEntreprise()->getName()
        ]);
    }
}
