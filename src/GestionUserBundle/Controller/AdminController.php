<?php
/**
 * Created by PhpStorm.
 * User: khlayil
 * Date: 2/3/18
 * Time: 11:21 PM
 */

namespace GestionUserBundle\Controller;


use GestionUserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    public function perso_profileAction(Request $request,$id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);


        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updateUser($user);


        }


        return $this->render("@GestionUser/admin/perso_profile.html.twig", array(
            'form' => $form->createView()
        ));

    }

}