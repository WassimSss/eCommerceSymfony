<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(EntityManagerInterface $em)
    {
        $product = //2mn04 https://learn.web-develop.me/view/courses/symfony-5-le-guide-complet-debutants-et-intermediaires/450423-doctrine-et-les-bases-de-donnees-1-heure-35-minutes/1291338-manipuler-des-enregistrements-avec-le-manager-de-doctrine
        return $this->render('home.html.twig');
    }
}
