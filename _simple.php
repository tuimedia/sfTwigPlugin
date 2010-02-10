<?php

require_once dirname(__FILE__).'/lib/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
require dirname(__FILE__).'/lib/extension/sfTwigExtensionAsset.class.php';
require dirname(__FILE__).'/lib/tokenparser/sfTwigTokenParserAsset.class.php';
require dirname(__FILE__).'/lib/node/sfTwigNodeAsset.class.php';

$loader = new Twig_Loader_Array(array(
  'index' => <<<EOF

{% sf include_component(foo, bar, ['a': 'b']) %}

EOF
  ,
));

$twig = new Twig_Environment($loader, array('debug' => false, 'cache' => false));
$twig->addExtension(new sfTwigExtensionAsset());

//echo $twig->tokenize($twig->getLoader()->getSource('index'), 'index');
//echo $twig->parse($twig->tokenize($twig->getLoader()->getSource('index'), 'index'))."\n\n";
echo $twig->compile($twig->parse($twig->tokenize($twig->getLoader()->getSource('index'), 'index')))."\n\n";


$template = $twig->loadTemplate('index');
echo $template->render(array());
echo "\n\n";
