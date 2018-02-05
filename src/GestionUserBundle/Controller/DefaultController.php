<?php

namespace GestionUserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{



    public function indexAction()
    {        $csrfToken = $this->has('security.csrf.token_manager')
        ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
        : null;
        $auth_checker = $this->get('security.authorization_checker');
        $router = $this->get('router');
        // 307: Internal Redirect
        if ($auth_checker->isGranted(['ROLE_ADMIN'])) {
            // SUPER_ADMIN roles go to the `admin_home` route
            return new RedirectResponse($router->generate('index_admin'), 307);
        } elseif ($auth_checker->isGranted('ROLE_USER')) {
            // Everyone else goes to the `home` route
            return new RedirectResponse($router->generate('index_user'), 307);
        }
        return $this->render('@FOSUser/Security/login.html.twig',array(
            'last_username' => null,
            'error' => null,
            'csrf_token' => $csrfToken,
        ));


    }



    public function indexadminAction()
    {
        return $this->render('@GestionUser/admin/index.html.twig');

    }

    public function indexuserAction()
    {
        return $this->render('@GestionUser/client/index.html.twig');

    }
}
