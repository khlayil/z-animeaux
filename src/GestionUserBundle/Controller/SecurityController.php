<?php

namespace GestionUserBundle\Controller;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseController
{

    public function loginAction(Request $request)
    {

        $resp =parent::loginAction($request);

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


        // Always call the parent unless you provide the ENTIRE implementation
        return $resp;
    }


    protected function renderLogin(array $data)
    {

       return $this->render('@FOSUser/Security/login.html.twig',$data);


    }

}
