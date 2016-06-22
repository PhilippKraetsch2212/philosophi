<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Account;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

		$dCountAccounts = count($accounts);

		$dSumCurrentAmount = 0;
		if ($dCountAccounts > 0) {
			foreach ($accounts as $account) {
				$dSumCurrentAmount += $account->getCurrentAmount();
			}
		}

		return $this->render(
			'finance/index.html.twig',
			array(
				'accounts' => $accounts,
				'count_accounts' => $dCountAccounts,
				'sum_current_amount' => $dSumCurrentAmount,
			)
		);
	}

	/**
	 * @Route("/finance/add-account", name="finance-add-account")
	 */
	public function addAccountAction(Request $request)
	{
		$account = new Account();

		$form = $this->createFormBuilder($account)
			->add('name', TextType::class, array('label' => 'Name'))
			->add('description', TextType::class, array('label' => 'Beschreibung', 'required' => false))
			->add('save', SubmitType::class, array('label' => 'Speichern'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			$account->setIdUser(1);
			$account->setCurrentAmount(0);
			$em = $this->getDoctrine()->getManager();
			$em->persist($account);
			$em->flush();

			return $this->redirectToRoute('finance');
		}
		
		return $this->render(
			'finance/new-account.html.twig',
			array(
				'form' => $form->createView(),
			)
		);
	}

	/**
	 * @Route("/finance/do-add-account", name="finance-do-add-account")
	 */
	public function doAddAccountAction(Request $request)
	{
		$form = $this->createForm();

		$form->handleRequest($request);

		if ($form->isValid()) {

			$this->addFlash(
				'notice',
				'Your changes were saved!'
			);

			return $this->redirectToRoute('finance');
		}

		return $this->render(
			'finance/new-account.html.twig',
			array()
		);
	}
}
