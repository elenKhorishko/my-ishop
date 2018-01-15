<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.01.2018
 * Time: 13:07
 */

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @Route("/cart/{id}", name="cart_show")
     */
    public function show(Order $order)
    {
        return $this->render('cart/show.html.twig', ['order' => $order, 'product' => Product::class]);
    }
}