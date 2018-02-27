<?php

namespace GestionUserBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use GestionUserBundle\Entity\User;
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

        $em=$this->getDoctrine()->getManager();
        $users=$em->getRepository(User::class)->findAll();
        $a=0;
        $v=0;
        $us=0;
        foreach ($users as $u)
        {
            if ($u->hasRole("ROLE_ADMIN"))
            {
                $a=$a+1;
            }
            if ($u->hasRole("ROLE_USER"))
            {
            $us=$us+1;
            }
            if ($u->hasRole("ROLE_VETE"))
            {
            $v=$v+1;
            }
        }

        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['roles', 'number role '],
                ['ROLE_ADMIN',     $a],
                ['ROLE_USER',      $us],
                ['ROLE_VETE',  $v]

            ]
        );
        $pieChart->getOptions()->setTitle('My Daily Activities');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);



        return $this->render('@GestionUser/admin/index.html.twig', array('piechart' => $pieChart));

    }

    public function indexuserAction()
    {
        return $this->render('@GestionUser/client/index.html.twig');

    }
}
