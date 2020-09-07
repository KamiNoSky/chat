<?php

namespace App\Controller;

use App\Entity\Chat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends AbstractController
{
    /**
     * @Route("/cat", name="cat")
     */
    public function index()
    {
        return $this->render('cat/index.html.twig', [
            'controller_name' => 'CatController',
        ]);
    }

    /**
     * @Route("/accueil", name="cat_accueil")
     */
    public function home(EntityManagerInterface $em){

        $catRepo = $this->getDoctrine()->getRepository(Chat::class);

        $cat = $catRepo->findifselling();

        return $this->render("default/accueil.html.twig", [
            "chats" => $cat
        ]);
    }

    /**
     * @Route ("/chat/{id}", name="chat_detail", requirements={"id": "\d+"})
     */

    public function detail($id) {

        $catRepo = $this->getDoctrine()->getRepository(Chat::class);
        $cat = $catRepo->find($id);

        return $this->render('default/detail.html.twig', [

            "chats" => $cat

        ]);
    }
}
