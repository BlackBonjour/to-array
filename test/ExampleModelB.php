<?php
declare(strict_types=1);

namespace BlackBonjourTest\ToArray;

use BlackBonjour\ToArray\ToArrayTrait;
use TypeError;

/**
 * Example model for unit test
 *
 * @author    Erick Dyck <info@erickdyck.de>
 * @since     07.09.2018
 * @package   BlackBonjourTest\ToArray
 * @copyright Copyright (c) 2018 Erick Dyck
 */
class ExampleModelB
{
    use ToArrayTrait;

    /** @var ExampleModelA */
    protected $modelA;

    /** @var object */
    protected $object;

    /**
     * Constructor
     *
     * @param object        $object
     * @param ExampleModelA $exampleModelA
     */
    public function __construct($object, ExampleModelA $exampleModelA)
    {
        if (\is_object($object) === false) {
            throw new TypeError(sprintf('Exepected parameter 1 to be an object, %s given!', gettype($object)));
        }

        $this->modelA = $exampleModelA;
        $this->object = $object;
    }

    /**
     * @return ExampleModelA
     */
    public function getModelA(): ExampleModelA
    {
        return $this->modelA;
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->object;
    }
}
