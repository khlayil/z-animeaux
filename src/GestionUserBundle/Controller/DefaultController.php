<?php

namespace GestionUserBundle\Controller;
use FOS\UserBundle\Controller\SecurityController as BaseController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        $auth_checker = $this->get('security.authorization_checker');
        $router = $this->get('router');

        // 307: Internal Redirect
        if ($auth_checker->isGranted(['ROLE_ADMIN'])) {
            // SUPER_ADMIN roles go to the `admin_home` route
            return new RedirectResponse($router->generate('index_admin'), 307);
        }

      elseif  ($auth_checker->isGranted('ROLE_USER')) {
            // Everyone else goes to the `home` route
            return new RedirectResponse($router->generate('index_user'), 307);
        }
        else
        {
            return $this->render("@GestionUser/Default/indexe.html.twig");
        }

    }

    public function indexadminAction()
    {
        return $this->render('@');

    }

    public function indexuserAction()
    {
        return $this->render('@GestionUser/Default/index_user.html.twig');

    }
}
