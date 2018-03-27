<?php

namespace GestionUserBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Histogram;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use ForumBundle\Entity\Post;
use ForumBundle\Entity\Rubrique;
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
                ['admin',     $a],
                ['client',      $us],
                ['veterinary',  $v]

            ]
        );
        $pieChart->getOptions()->setTitle('registred user type');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);


        $chien=$em->getRepository(Post::class)->countChienPosts();
        $chat=$em->getRepository(Post::class)->countChatPosts();
        $oiseau=$em->getRepository(Post::class)->countOiseauPosts();
        $rongeur=$em->getRepository(Post::class)->countRongeurPosts();





        $pieChart1 = new PieChart();
        $pieChart1->getData()->setArrayToDataTable(
            [['category', 'post number '],
                ['chat',   (int)  $chien],
                ['chien',   (int)   $chat],
                ['rongeur',(int)  $oiseau],
                ['oiseaux', (int) $rongeur]

            ]
        );
        $pieChart1->getOptions()->setTitle('nombre post rapport category');
        $pieChart1->getOptions()->setHeight(500);
        $pieChart1->getOptions()->setWidth(900);
        $pieChart1->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart1->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart1->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart1->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart1->getOptions()->getTitleTextStyle()->setFontSize(20);


        $chienp=$em->getRepository(Post::class)->countCommentChienPosts();
        $chatp=$em->getRepository(Post::class)->countCommentChatPosts();
        $oiseaup=$em->getRepository(Post::class)->countCommentChatPosts();
        $rongeurp=$em->getRepository(Post::class)->countCommentChatPosts();


        $col = new ColumnChart();
        $col->getData()->setArrayToDataTable(
            [
                ['Time of Day', 'nombre comment', ['role' => 'annotation'], 'nombre post', ['role' => 'annotation']],
                [['v' => "aa", 'f' => 'chien '],  (int)$chienp, 'comment', (int) $chien, 'post'],
                [['v' => "bb", 'f' => 'chat'],  (int)$chatp, 'comment',  (int)$chat, 'post'],
                [['v' => "daz", 'f' => 'oiseaux '], (int)$oiseaup, 'comment',    (int)$oiseau,  'post'],
                [['v' => "aed", 'f' => 'rongeur '], (int)$rongeurp, 'comment', (int)$rongeur,  'post'],
            ]
        );
        $col->getOptions()->setTitle('rapport comment et post pour chaque category');
        $col->getOptions()->getAnnotations()->setAlwaysOutside(true);
        $col->getOptions()->getAnnotations()->getTextStyle()->setFontSize(14);
        $col->getOptions()->getAnnotations()->getTextStyle()->setColor('#000');
        $col->getOptions()->getAnnotations()->getTextStyle()->setAuraColor('none');
        $col->getOptions()->getHAxis()->setTitle('Time of Day');

        $col->getOptions()->getHAxis()->getViewWindow()->setMin([5, 30, 0]);
        $col->getOptions()->getHAxis()->getViewWindow()->setMax([17, 30, 0]);
        $col->getOptions()->getVAxis()->setTitle('Rating (scale of 1-10)');
        $col->getOptions()->setWidth(900);
        $col->getOptions()->setHeight(500);



        return $this->render('@GestionUser/admin/index.html.twig', array('piechart' => $pieChart,"piechart1"=>$pieChart1,"cole"=>$col));

    }

    public function indexuserAction()
    {
        return $this->render('@GestionUser/client/index.html.twig');

    }
}
