<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Collection;

class CollectingController extends Controller
{
    /**
     * @Route("/collecting/", name="collecting")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Collection');

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

}
