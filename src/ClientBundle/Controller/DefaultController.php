<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{


    public function cartAction(){
        return $this->render('@Client/Default/cart.html.twig');
    }

    public function checkoutAction()
    {
        return $this->render('@Client/Default/checkout.html.twig');
    }

    public function collectionAction(){
        return $this->render('@Client/Default/collection.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Client/Default/contact.html.twig');
    }

    public function productAction()
    {
        return $this->render('@Client/Default/products.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@Client/Default/about.html.twig');
    }


}
