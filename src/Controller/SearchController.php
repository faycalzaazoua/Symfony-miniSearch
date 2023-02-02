<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    public function __construct(private ProductRepository $productRepository){

    }

    #[Route('/', name: 'index')]
    public function index():Response {
        
        return $this->render('search/index.html.twig');
    }

    #[Route('/search', name: 'search')]
    public function search():Response {

        if(isset($_GET['nom']) && !empty($_GET['nom'])){
            return $this->render('search/search.html.twig', ['myData' => $this->productRepository->search($_GET['nom'])->getResult()]);
        }else{
            return $this->render('search/search.html.twig', ['myData' => $this->productRepository->findAll()]);

        }
    }



}