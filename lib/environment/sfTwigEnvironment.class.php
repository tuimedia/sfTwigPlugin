<?php

/*
 * This file is part of the sfTwigPlugin package.
 *
 * (c) Henrik Bjornskov <henrik@bearwoods.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Symfony specific Twig Environment.
 *
 * Enables the user to get sfContext without the getInstance method and later
 * on enable more symfony goodness
 *
 * @package    sfTwigPlugin
 * @subpackage environment
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Yurii Berest <djua.com@gmail.com>
 */
class sfTwigEnvironment extends Twig_Environment
{
    /**
     * @var sfContext
     */
    protected $context = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(Twig_LoaderInterface $loader, array $options = array())
    {
        parent::__construct($loader, $options);

        if (isset($options['sf_context']) && $options['sf_context'] instanceof sfContext) {
            $this->context = $options['sf_context'];
        } else {
            $this->context = sfContext::getInstance();
        }
    }

    /**
     * Returns sfContext this can be used in filters.
     *
     * @return sfContext
     */
    public function getContext()
    {
        // throw new \InvalidArgumentException('asd');

        return $this->context;
    }

    /**
     * {@inheritdoc}
     */
    protected function writeCacheFile($file, $content)
    {
        $dir = dirname($file);
        $currentUmask = umask(0000);

        if (!is_dir($dir)) {
            if (false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
                throw new RuntimeException(sprintf("Unable to create the cache directory (%s).", $dir));
            }
        } elseif (!is_writable($dir)) {
            throw new RuntimeException(sprintf("Unable to write in the cache directory (%s).", $dir));
        }

        $success = false;
        $tmpFile = tempnam(dirname($file), basename($file));
        if (false !== @file_put_contents($tmpFile, $content)) {
            if (false === ($success = @rename($tmpFile, $file))) {
                $success = copy($tmpFile, $file);
                $success = unlink($tmpFile) && $success;
            }
        }

        if ($success) {
            chmod($file, 0666);
        }

        umask($currentUmask);

        if (!$success) {
            throw new RuntimeException(sprintf('Failed to write cache file "%s".', $file));
        }
    }

}
