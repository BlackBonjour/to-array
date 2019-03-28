<?php
declare(strict_types=1);

namespace BlackBonjourTest\ToArray;

use BlackBonjour\ToArray\ToArrayTrait;

/**
 * @author    Erick Dyck <info@erickdyck.de>
 * @since     28.03.2019
 * @package   BlackBonjourTest\ToArray
 * @copyright Copyright (c) 2019 Erick Dyck
 */
class ExampleModelC
{
    use ToArrayTrait;

    /** @var ExampleModelA */
    protected $modelA;

    /** @var object[] */
    protected $objects;

    /**
     * @param object[]      $objects
     * @param ExampleModelA $exampleModelA
     */
    public function __construct(array $objects, ExampleModelA $exampleModelA)
    {
        $this->modelA  = $exampleModelA;
        $this->objects = $objects;
    }

    /**
     * @return ExampleModelA
     */
    public function getModelA(): ExampleModelA
    {
        return $this->modelA;
    }

    /**
     * @return object[]
     */
    public function getObject(): array
    {
        return $this->objects;
    }
}
