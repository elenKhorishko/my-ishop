<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index(EntityManagerInterface $em)
    {
        $produkt = new Product();
        $produkt->setName('Notebook')->setPrice(8999.99)->setDescription('Cool notebook pc');

        $em->persist($produkt);
        $em->flush();

        return new Response('Product created');
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(Product $product)
    {
        return $this->render('product/show.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/products/{name}", name="products_list")
     */
    public function listProducts($name = '')
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);
//        $product = $repo->findOneBy(['name' => $name]);

        if($name){
            $products = $repo->findBy(['name' => $name], ['price' => 'DESC']);
        } else {
            $products = $repo->findAll();
        }

        if(!$products){
            throw $this->createNotFoundException('Product not found!');
        }

        return $this->render('product/list.html.twig', ['products' => $products]);

    }

    /**
     * @Route("/product-update/{id}", name="product_update")
     */
    public function update(Product $product, EntityManagerInterface $em)
    {
        $product->setName('Laptop');
        $em->flush();
        return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/product-delete/{id}", name="product_delete")
     */
    public function delete(Product $product, EntityManagerInterface $em)
    {
        $em->remove($product);
        $em->flush();
        return $this->render('product/show.html.twig', ['product' => $product]);
    }



}

