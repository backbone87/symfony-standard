<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $builder = $this->createFormBuilder();
        $builder->add('content', TextType::class);
        $builder->add('submit', SubmitType::class);
        $form = $builder->getForm();
        $form->handleRequest($request);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir'  => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'form'      => $form->createView(),
            'submitted' => $form->isSubmitted(),
            'valid'     => $form->isValid(),
        ]);
    }
}
