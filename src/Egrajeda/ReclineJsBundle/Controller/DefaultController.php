<?php

namespace Egrajeda\ReclineJsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Egrajeda\ReclineJsBundle\Helper\ArrayToCsvTransformer;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        $reportContainer = $this->get('egrajeda_reclinejs.report_container');

        return array('reports' => $reportContainer->all());
    }

    /**
     * @Route("/{slug}")
     * @Template
     */
    public function showAction($slug)
    {
        $reportContainer = $this->get('egrajeda_reclinejs.report_container');
        foreach ($reportContainer->all() as $report) {
            if ($report->getSlug() === $slug) {
                return array('report' => $report);
            }
        }

        throw new \Exception;
    }

    /**
     * @Route("/csv/{slug}")
     */
    public function csvAction($slug)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $slug . '.csv"');

        $reportContainer = $this->get('egrajeda_reclinejs.report_container');
        foreach ($reportContainer->all() as $report) {
            if ($report->getSlug() === $slug) {
                $fooReport = $report;
            }
        }

        $data = $fooReport->getData();
        $transformer = new ArrayToCsvTransformer();

        $response->setContent($transformer->transform($data));

        return $response;
    }
}
