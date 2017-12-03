<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.12.2017
 * Time: 21:51
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class About extends Controller
{
    /**
     *
     * @Route("/ishop/about")
     * @return Response
     */

    public function number(){
        $number = mt_rand(1, 100);
        return $this->render('ishop/about.html.twig', array(
            'number' => $number,
        ));
    }
}