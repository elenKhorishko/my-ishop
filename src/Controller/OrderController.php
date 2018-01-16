<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.01.2018
 * Time: 13:07
 */

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use App\Servise\Orders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class OrderController extends Controller
{

    /**
     * @Route("order/add-product/{id}/{count}", name="order_add_product",
     *          requirements={"id": "\d+", "count": "\d+(\.\d+)?"})
     */
    public function addProduct(Product $product, float $count,
                               Orders $orders, Request $request)
    {
        $orders->addProduct($product, $count);
        return $this->redirect($request->headers->get('referer'));
    }


    /**
     * @Route("cart", name="order_cart")
     */
    public function showCart(Orders $orders)
    {
        return $this->render('cart/show.html.twig', ['order' => $orders->getCurrentOrder()]);
    }
}