<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaygroundController extends Controller
{
    /**
     * @Route("/playground/lottozahlen/{count}")
     */
    public function numberAction($count = 6)
    {
    	$numbersList = '';
    	$availableNumbers = array();
    	for ($i = 1; $i <= 49; $i++) {
    		$availableNumbers[] = $i;
    	}
        $numbers = array();
        while (count($numbers) < $count) {
            $choosenNumber = rand(1, 49);
            if (in_array($choosenNumber, $availableNumbers)) {
                $numbers[] = $choosenNumber;
                $availableNumbers = array_diff($availableNumbers, array($choosenNumber));
            }
        }
        asort($numbers);
        $numbersList = implode(', ', $numbers);
        return $this->render(
            'playground/lottozahlen.html.twig',
            array('luckyNumberList' => $numbersList)
        );
    }
    
    /**
     * @Route("/disney/")
     */
    public function disneyAction()
    {
    	return $this->render(
    		'playground/disney.html.twig',
    		array()
    	);
    }
}