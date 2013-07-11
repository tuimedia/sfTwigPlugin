<?php
/**
 * 
 * @author Yuriy Berest <djua.com@gmail.com>
 */
abstract class sfTwigExtension extends Twig_Extension
{

    protected function buildMirrorFunctions($names, $options = array())
    {
        $result = array();

        foreach ($names as $name) {
            $result[$name] = new Twig_Function_Function($name, $options);
        }

        return $result;
    }

}