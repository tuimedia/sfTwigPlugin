<?php
//php helpers.php /path/to/syfmony/lib/helper/
$outputPath = '../lib/extensions/';
if (!file_exists($outputPath)) {
    mkdir($outputPath, true);
}
$helper = $_SERVER['argv'][1];
foreach(glob($helper . '*Helper.php') as $file) {
    $filename  = basename($file);
    preg_match('/^(.*)Helper.php$/',$filename, $match);
    $classname = strtolower($match[1]);
    $fileData  = file($file);
    $outputFile = $outputPath . ucfirst($classname) . '_Twig_Extension.class.php';
    $helpers = array();
    foreach($fileData as $line) {
        if (preg_match('/function ([^_][[:alnum:]_]+)\(.*$/', $line, $match)) {
            $helpers[] = strtolower($match[1]);
        }
    }

    
    $s = file_get_contents(dirname(__FILE__) . '/Twig_Extension.class.php.tpl');
    $arrayData = ''; 
    foreach($helpers as $helper) {
       $arrayData .= str_repeat('  ', 7) . sprintf("'%s' => new Twig_Filter_Function('%s'),\n", $helper, $helper);
    }
    $data = sprintf($s, ucfirst($classname), rtrim($arrayData), $classname);
    file_put_contents($outputFile, $data);

    echo exec("php -l $outputFile"), "\n";
}

