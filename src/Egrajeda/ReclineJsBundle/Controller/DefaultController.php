<?php

namespace Egrajeda\ReclineJsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Egrajeda\ReclineJsBundle\SqlReportA;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="prueba.csv"');

        $report = new SqlReportA($this->getDoctrine()->getManager());
        $response->setContent($report->getCsv());

        return $response;
    }

    /**
     * @Route("/show")
     */
    public function showAction()
    {
        return $this->render('EgrajedaReclineJsBundle:Default:show.html.twig');
    }
}
