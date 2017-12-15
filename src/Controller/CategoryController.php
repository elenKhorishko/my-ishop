<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.12.2017
 * Time: 12:25
 */

namespace App\Controller;

use App\Entity\Category;
use App\Servise\Catalogue;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CategoryController extends Controller

{
    /**
     * @var Catalogue;
     */
    private $catalogue;

    public function __construct(Catalogue $catalogue)
    {
        $this->catalogue = $catalogue;
    }


    /**
     * @Route("/category/{slug}/{page}",
     * name="category_show",
     * requirements={"page" = "\d+"})
     * @param $page
     * @param $slug
     * @param $session
     * @ParamConverter("slug", options={"mapping": {"slug" = "slug"}})
     */
    public function show(Category $category, $page = 1)
    {
       return $this->render('category/show.html.twig', ['category' => $category, 'page' => $page]);
    }


    /**
     * @Route("/categories", name="categoies_list")
     */
    public function listCategories()
    {
        $categories = $this->catalogue->getCategories();

        if(!$categories){
            throw $this->createNotFoundException('Category not found!');
        }

        return $this->render('category/list.html.twig', ['category' => $categories]);
    }

    /**
     * @Route("/message", name="category_message")
     */
    public function message(SessionInterface $session)
    {
        $this->addFlash('notice', 'Successfully added.');
        $lastCategory = $session->get('lastVisitedCategory');
        return $this->redirectToRoute('category_show', ['slug'=> $lastCategory]);
    }

    /**
     * @Route("download", name="download")
     */
    public function fileDownload()
    {
        $response = new Response();
        $response->setContent('Test content');
        return $response;
    }

}