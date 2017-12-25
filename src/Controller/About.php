<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.12.2017
 * Time: 21:51
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class About extends Controller
{
    /**
     *
     * @Route("/ishop/about", name = "about_show")
     */
    public function show(SessionInterface $session)
    {
        $url = $this->generateUrl('category_show', [
            'slug' => 'notebooks',
            'param' => 'getparam'], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('ishop/about.html.twig', [
            'notebooksUrl' => $url,
            'lastCategory' => $session->get ('lastVisitedCategory')
            ]);
    }

    /**
     * @Route("/to_about")
     */
    public function redirectToShow()
    {
        return $this->redirectToRoute('about_show');
    }
}