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

        $accounts = $this->getUser()->getAccounts();

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
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $account->setUser($this->getUser());
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
     * @Route("/finance/delete-account/{id}", name="finance-delete-account")
     */
    public function deleteAccountAction($id = null)
    {
        if ($id === null) {
            $this->addFlash('danger', 'Kein Konto angegeben!');
            return $this->redirectToRoute('finance');
        }
        $account = $this->getDoctrine()
            ->getRepository('AppBundle:Account')
            ->find($id);

        if (!$account) {
            $this->addFlash('danger', 'Das Konto wurde nicht gefunden!');
            return $this->redirectToRoute('finance');
        }

        if (count($account->getBookings()) > 0) {
            $this->addFlash('danger', 'Konto kann nicht gelöscht werden, da es Buchungen gibt!');
            return $this->redirectToRoute('finance');
        }

        return $this->render(
            'finance/delete-account.html.twig',
            array('account' => $account)
        );
    }

    /**
     * @Route("/finance/do-delete-account/{id}")
     */
    public function doDeleteAccountAction($id = null)
    {
        if ($id === null) {
            $this->addFlash('danger', 'Kein Konto angegeben!');
            return $this->redirectToRoute('finance');
        }
        $account = $this->getDoctrine()
            ->getRepository('AppBundle:Account')
            ->find($id);

        if (!$account) {
            $this->addFlash('danger', 'Das Konto wurde nicht gefunden!');
            return $this->redirectToRoute('finance');
        }

        if (count($account->getBookings()) > 0) {
            $this->addFlash('danger', 'Konto kann nicht gelöscht werden, da es Buchungen gibt!');
            return $this->redirectToRoute('finance');
        }

        $em = $this->getDoctrine()->getManager();
        try {
            $em->remove($account);
            $em->flush();
            $this->addFlash('success', 'Das Konto "' . $account->getName() . '" wurde gelöscht!');
        } catch (Exception $e) {
            $this->addFlash('danger', 'Das Konto konnte nicht gelöscht werden!');
        }
        return $this->redirectToRoute('finance');
    }

    /**
     * @Route("/finance/show-account-details/{id}")
     */
    public function showAccountDetailsAction($id = null)
    {
        if ($id === null) {
            $this->addFlash('danger', 'Kein Konto angegeben!');
            return $this->redirectToRoute('finance');
        }
        $account = $this->getDoctrine()
            ->getRepository('AppBundle:Account')
            ->find($id);

        if (!$account) {
            $this->addFlash('danger', 'Das Konto wurde nicht gefunden!');
            return $this->redirectToRoute('finance');
        }

        $bookings = $account->getBookings();
        $dCountBookings = count($bookings);
        $dSumCurrentAmount = 0;
        if ($dCountBookings > 0) {
            foreach ($bookings as $booking) {
                $dSumCurrentAmount += $booking->getCredit();
                $dSumCurrentAmount -= $booking->getDebit();
            }
        }
        return $this->render(
            'finance/show-account-details.html.twig',
            array(
                'account' => $account,
                'bookings' => $bookings,
                'count_bookings' => $dCountBookings,
                'sum_current_amount' => $dSumCurrentAmount,
            )
        );
    }
}
