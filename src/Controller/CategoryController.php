<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends AbstractController
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function renderMenuList(){
        $categories = $this->categoryRepository->findAll();

        return $this->render('category/_menu.html.twig', [
            'categories' => $categories
        ]);
    }
    /**
     * @Route("/admin/category/create", name="category_create")
     */
    public function create(Request $request, SluggerInterface $slugger,EntityManagerInterface $em): Response
    {

        $category = new Category;
        $form = $this->createForm(CategoryType::class, $category, [
            'required' => false
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // $category = $form->getData();
            $category->setSlug(strtolower($slugger->slug($category->getName())));
            
            $em->persist($category);
            $em->flush();

            // $response = new RedirectResponse($url);
            // $url = $urlGenerator->generate('homepage');
            // $response->headers->set('Location', $url);
            // $response->setStatusCode(302);
            
            return $this->redirectToRoute('homepage');
        }

        $formView = $form->createView();
        return $this->render('category/create.html.twig', [
            'formView' => $formView,
        ]);
    }

    /**
     * @Route("/admin/category/{id}/edit", name="category_edit")
     */
    public function edit($id, CategoryRepository $categoryRepository, Request $request, SluggerInterface $slugger, EntityManagerInterface $em, Security $security): Response
    {   
        $category = $categoryRepository->find($id);
        if(!$category) {
            throw new NotFoundHttpException("Cette categorie n'utilise pas");
        }
        $form = $this->createForm(CategoryType::class, $category);
        
        
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $category->setSlug(strtolower($slugger->slug($category->getName())));
            $em->persist($category);
            $em->flush();

            // return $this->redirectToRoute('homepage');
        }

        if (!$category) {
            throw $this->createNotFoundException("Cette id n'existe pas");
        }

        $formView = $form->createView();

        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'formView' => $formView 
        ]);
    }
}
