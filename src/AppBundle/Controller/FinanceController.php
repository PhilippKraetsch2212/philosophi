<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FinanceController extends Controller
{
	/**
	 * @Route("/finance/", name="finance")
	 */
	public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()
		->getRepository('AppBundle:Account');
		
		$accounts = $repository->findBy(
				array('idUser' => 1),
				array('name' => 'ASC')
				);

		return $this->render('finance/index.html.twig', array('accounts' => $accounts));
	}
}
