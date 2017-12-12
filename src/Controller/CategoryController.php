<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.12.2017
 * Time: 12:25
 */

namespace App\Controller;

use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CategoryController extends Controller

{
    /**
     * @Route("/category/{id}/{page}", name="category_show")
     */
    public function show(Category $category, $page = 1)
    {
        return $this->render('category/show.html.twig', ['category' => $category, 'page' => $page]);
    }


    /**
     * @Route("/category/{name}", name="$category_list")
     */
    public function listCategory($name = '')
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);

        if($name){
            $category = $repo->findBy(['name' => $name]);
        } else {
            $category = $repo->findAll();
        }

        if(!$category){
            throw $this->createNotFoundException('Category not found!');
        }

        return $this->render('category/list.html.twig', ['category' => $category]);

    }

}