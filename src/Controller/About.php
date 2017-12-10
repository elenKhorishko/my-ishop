<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.12.2017
 * Time: 21:51
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class About extends Controller
{
    /**
     *
     * @Route("/ishop/about")
     */

    public function showAbout(){
        return $this->render('ishop/about.html.twig');
    }
}
