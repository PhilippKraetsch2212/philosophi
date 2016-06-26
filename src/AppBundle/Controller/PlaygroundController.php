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
        $filme = [];

        $filme[] = ['name' => 'Dornröschen - 2 Disc-Delux Edition',
            'image' => 'images/01.jpg', 'owned' => true];
        $filme[] = ['name' => 'Taran und der Zauberkessel',
            'image' => 'images/02.jpg', 'owned' => true];
        $filme[] = ['name' => 'Drei Caballeros',
            'image' => 'images/03.jpg', 'owned' => true];
        $filme[] = ['name' => 'Fantasia',
            'image' => 'images/04.jpg', 'owned' => false];
        $filme[] = ['name' => 'Robin Hood',
            'image' => 'images/05.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die tollkühne Hexe in ihrem fliegenden Bett',
            'image' => 'images/06.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Hexe und der Zauberer',
            'image' => 'images/06.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die vielen Abenteuer von Winnie Puuh',
            'image' => 'images/08.jpg', 'owned' => true];
        $filme[] = ['name' => 'Das grosse Krabbeln- 2-Disc-Delux-Edition',
            'image' => 'images/09.jpg', 'owned' => true];
        $filme[] = ['name' => 'Hercules',
            'image' => 'images/10.jpg', 'owned' => true];
        $filme[] = ['name' => 'Bernard und Bianca - Die Mäusepolizei',
            'image' => 'images/11.jpg', 'owned' => true];
        $filme[] = ['name' => 'Peter Pan',
            'image' => 'images/12.jpg', 'owned' => true];
        $filme[] = ['name' => 'Dinosaurier',
            'image' => 'images/13.jpg', 'owned' => true];
        $filme[] = ['name' => 'Basil, der grosse Mäusedetektiv',
            'image' => 'images/14.jpg', 'owned' => true];
        $filme[] = ['name' => 'Oliver & Co',
            'image' => 'images/15.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cap und Capper',
            'image' => 'images/16.jpg', 'owned' => true];
        $filme[] = ['name' => 'Pinocchio Special Edition',
            'image' => 'images/17.jpg', 'owned' => true];
        $filme[] = ['name' => 'Alice im Wunderland (Special Edition)',
            'image' => 'images/18.jpg', 'owned' => true];
        $filme[] = ['name' => 'Mary Poppins (Special Edition)',
            'image' => 'images/19.jpg', 'owned' => true];
        $filme[] = ['name' => 'Ein Königreich für ein Lama',
            'image' => 'images/20.jpg', 'owned' => true];
        $filme[] = ['name' => 'Fröhlich, Frei, Spass dabei',
            'image' => 'images/21.jpg', 'owned' => true];
        $filme[] = ['name' => 'Elliot, das Schmunzelmonster',
            'image' => 'images/22.jpg', 'owned' => true];
        $filme[] = ['name' => 'Toy Story 2 (Special Edition)',
            'image' => 'images/23.jpg', 'owned' => false];
        $filme[] = ['name' => 'Atlantis - Das Geheimnis der verlorenen Stadt',
            'image' => 'images/24.jpg', 'owned' => true];
        $filme[] = ['name' => 'Aristocats',
            'image' => 'images/25.jpg', 'owned' => true];
        $filme[] = ['name' => 'Bernard und Bianca im Känguruland',
            'image' => 'images/26.jpg', 'owned' => true];
        $filme[] = ['name' => 'Saludos Amigos',
            'image' => 'images/27.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Monster AG',
            'image' => 'images/28.jpg', 'owned' => true];
        $filme[] = ['name' => 'Toy Story (Special Edition)',
            'image' => 'images/29.jpg', 'owned' => true];
        $filme[] = ['name' => 'Dumbo',
            'image' => 'images/30.jpg', 'owned' => true];
        $filme[] = ['name' => 'Musik, Tanz und Rhythmus',
            'image' => 'images/31.jpg', 'owned' => true];
        $filme[] = ['name' => 'Der Glöckner von Notre Dame',
            'image' => 'images/32.jpg', 'owned' => true];
        $filme[] = ['name' => 'Der Glöckner von Notre Dame 2',
            'image' => 'images/33.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Abenteuer von Ichabod und Taddäus Kröte',
            'image' => 'images/34.jpg', 'owned' => true];
        $filme[] = ['name' => 'Lilo & Stitch',
            'image' => 'images/35.jpg', 'owned' => true];
        $filme[] = ['name' => 'Mulan Special Edition',
            'image' => 'images/36.jpg', 'owned' => true];
        $filme[] = ['name' => 'Der Schatzplanet',
            'image' => 'images/37.jpg', 'owned' => true];
        $filme[] = ['name' => 'Findet Nemo 2-Disc-Edition',
            'image' => 'images/38.jpg', 'owned' => true];
        $filme[] = ['name' => 'Pocahontas',
            'image' => 'images/39.jpg', 'owned' => true];
        $filme[] = ['name' => 'Pocahontas 2: Reise in eine neue Welt',
            'image' => 'images/40.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Kühe sind los',
            'image' => 'images/41.jpg', 'owned' => true];
        $filme[] = ['name' => 'Mulan 2',
            'image' => 'images/42.jpg', 'owned' => true];
        $filme[] = ['name' => 'Bärenbrüder',
            'image' => 'images/43.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Unglaublichen - The Incredibles 2-Disc-Edition',
            'image' => 'images/44.jpg', 'owned' => true];
        $filme[] = ['name' => 'Tarzan (2-Disc-Edition)',
            'image' => 'images/45.jpg', 'owned' => true];
        $filme[] = ['name' => 'Lilo & Stitch 2 - Stitch völlig abgedreht',
            'image' => 'images/46.jpg', 'owned' => true];
        $filme[] = ['name' => 'Tarzan 2',
            'image' => 'images/47.jpg', 'owned' => true];
        $filme[] = ['name' => 'Ein Königreich für ein Lama 2 - Kronks grosses Abenteuer',
            'image' => 'images/48.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die drei Musketiere',
            'image' => 'images/49.jpg', 'owned' => true];
        $filme[] = ['name' => 'Himmel und Huhn',
            'image' => 'images/50.jpg', 'owned' => true];
        $filme[] = ['name' => 'Tierisch Wild',
            'image' => 'images/51.jpg', 'owned' => true];
        $filme[] = ['name' => 'Bärenbrüder 2',
            'image' => 'images/52.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cap und Capper 2',
            'image' => 'images/53.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cars',
            'image' => 'images/54.jpg', 'owned' => true];
        $filme[] = ['name' => 'Aristocats Sammler Edition',
            'image' => 'images/55.jpg', 'owned' => true];
        $filme[] = ['name' => 'Triff die Robinsons',
            'image' => 'images/56.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die Hexe und der Zauberer 45. Jubiläumsedition',
            'image' => 'images/57.jpg', 'owned' => true];
        $filme[] = ['name' => 'Ratatouille',
            'image' => 'images/58.jpg', 'owned' => true];
        $filme[] = ['name' => 'Oliver & Co 20. Jubiläumsedition',
            'image' => 'images/59.jpg', 'owned' => true];
        $filme[] = ['name' => 'Mary Poppins 45. Jubiläumsedition',
            'image' => 'images/60.jpg', 'owned' => true];
        $filme[] = ['name' => 'Die tollkühne Hexe in ihrem fliegenden Bett Special Edition',
            'image' => 'images/61.jpg', 'owned' => true];
        $filme[] = ['name' => 'Elliot, das Schmunzelmonster Special Edition',
            'image' => 'images/62.jpg', 'owned' => true];
        $filme[] = ['name' => 'WALL-E - Der Letzte räumt die Erde auf',
            'image' => 'images/63.jpg', 'owned' => true];
        $filme[] = ['name' => 'Basil, der grosse Mäusedetektiv Special Edition',
            'image' => 'images/64.jpg', 'owned' => true];
        $filme[] = ['name' => 'Bolt - Ein Hund für alle Fälle',
            'image' => 'images/65.jpg', 'owned' => true];
        $filme[] = ['name' => 'Taran und der Zauberkessel 25. Jubiläumsedition',
            'image' => 'images/66.jpg', 'owned' => true];
        $filme[] = ['name' => 'Dumbo 70. Jubiläumsedition',
            'image' => 'images/67.jpg', 'owned' => true];
        $filme[] = ['name' => 'Alice im Wunderland 60. Jubiläumsedition',
            'image' => 'images/68.jpg', 'owned' => true];
        $filme[] = ['name' => 'Oben',
            'image' => 'images/69.jpg', 'owned' => true];
        $filme[] = ['name' => 'Küss den Frosch',
            'image' => 'images/70.jpg', 'owned' => true];
        $filme[] = ['name' => 'Rapunzel - Neu verföhnt',
            'image' => 'images/71.jpg', 'owned' => true];
        $filme[] = ['name' => 'Toy Story 3',
            'image' => 'images/72.jpg', 'owned' => true];
        $filme[] = ['name' => 'Atlantis - Die Rückkehr',
            'image' => 'images/73.jpg', 'owned' => true];
        $filme[] = ['name' => 'Pinocchio',
            'image' => 'images/74.jpg', 'owned' => true];
        $filme[] = ['name' => 'Fantasia',
            'image' => 'images/75.jpg', 'owned' => true];
        $filme[] = ['name' => 'Fantasia 2000',
            'image' => 'images/76.jpg', 'owned' => false];
        $filme[] = ['name' => '101 Dalmatiner',
            'image' => 'images/77.jpg', 'owned' => true];
        $filme[] = ['name' => '101 Dalmatiner Teil 2 - Auf kleinen Pfoten zum…',
            'image' => 'images/78.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cars 2',
            'image' => 'images/79.jpg', 'owned' => true];
        $filme[] = ['name' => 'Peter Pan',
            'image' => 'images/80.jpg', 'owned' => true];
        $filme[] = ['name' => 'Peter Pan 2: Neue Abenteuer in Nimmerland',
            'image' => 'images/81.jpg', 'owned' => true];
        $filme[] = ['name' => 'Aladdin',
            'image' => 'images/82.jpg', 'owned' => true];
        $filme[] = ['name' => 'Dschafars Rückkehr',
            'image' => 'images/83.jpg', 'owned' => true];
        $filme[] = ['name' => 'Aladdin und der König der Diebe',
            'image' => 'images/84.jpg', 'owned' => true];
        $filme[] = ['name' => 'Toy Story (Special Edition)',
            'image' => 'images/85.jpg', 'owned' => true];
        $filme[] = ['name' => 'Toy Story 2 (Special Edition)',
            'image' => 'images/86.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cinderella',
            'image' => 'images/87.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cinderella 2 - Träume werden wahr',
            'image' => 'images/88.jpg', 'owned' => true];
        $filme[] = ['name' => 'Cinderella 3 - Wahre Liebe siegt',
            'image' => 'images/89.jpg', 'owned' => true];
        $filme[] = ['name' => 'Susi und Strolch',
            'image' => 'images/90.jpg', 'owned' => true];
        $filme[] = ['name' => 'Susi und Strolch 2: Kleine Strolche - Grosses Abenteuer!',
            'image' => 'images/91.jpg', 'owned' => true];
        $filme[] = ['name' => 'Ralph reichts',
            'image' => 'images/92.jpg', 'owned' => true];
        $filme[] = ['name' => 'Findet Nemo',
            'image' => 'images/93.jpg', 'owned' => true];
        $filme[] = ['name' => 'Merida - Legende der Highlands',
            'image' => 'images/94.jpg', 'owned' => true];

        return $this->render(
            'playground/disney.html.twig',
            array('filme' => $filme)
        );
    }
}