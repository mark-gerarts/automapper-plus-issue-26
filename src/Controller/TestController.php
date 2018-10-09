<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\ProductDto;
use AutoMapperPlus\AutoMapperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * @var AutoMapperInterface
     */
    private $mapper;

    public function __construct(AutoMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getRepository(Product::class);
        $product = $em->findOneBy([]);

        dump($this->mapper->map($product, ProductDto::class));

        return new Response();
    }
}
