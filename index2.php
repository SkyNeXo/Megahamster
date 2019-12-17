<?php

include 'vendor/autoload.php';
use FIS\Megahamster\Living as Living;

$view = new \TYPO3Fluid\Fluid\View\TemplateView();
$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename("./Resources/Private/Templates/Main.html");

$rooms["room"][] = new Living\RectangularRoom("The Flat", 149.00, 80, 50, []);
$rooms["room"][] = new Living\RectangularRoom("The Room", 49.00, 120, 80, ["Food jars"]);
$rooms["room"][] = new Living\OctagonalRoom("The Pit", 69.00, 20, ["Hamster training gloves", "Hamster punching sack"]);

$view->assignMultiple($rooms);

echo $view->render();