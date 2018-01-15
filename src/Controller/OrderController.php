<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.01.2018
 * Time: 13:07
 */

namespace App\Controller;

use App\Entity\Order;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class OrderController extends Controller
{
    /**
     * @Route("/cart/{id}", name="cart_show")
     * var $orderItem
     */
    public function show(Order $order, $orderItem='')
    {
        $order->getItems();
        return $this->render('cart/show.html.twig', ['order' => $order]);
    }
}