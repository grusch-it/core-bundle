<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao\CoreBundle\Adapter;

/**
 * A general Adapter class building a wrapper around any class that is not
 * Unit testable/mockable. It only delegates method calls to the specified
 * class
 *
 * @author Yanick Witschi <https://github.com/toflar>
 *
 */
final class Adapter
{
    /**
     * Class name.
     *
     * @var string
     */
    private $class;

    /**
     * Adapter constructor.
     *
     * @param string                    $class
     */
    public function __construct($class)
    {
        $this->class    = $class;
    }

    /**
     * Calls any method of the given class.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($name, array $arguments = [])
    {
        return call_user_func_array($this->class . '::' . $name, $arguments);
    }
}
