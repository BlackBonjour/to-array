<?php
declare(strict_types=1);

namespace BlackBonjourTest\ToArray;

use BlackBonjour\ToArray\ToArrayTrait;

/**
 * Example model for unit test
 *
 * @author    Erick Dyck <info@erickdyck.de>
 * @since     07.09.2018
 * @package   BlackBonjourTest\ToArray
 * @copyright Copyright (c) 2018 Erick Dyck
 */
class ExampleModelA
{
    use ToArrayTrait;

    /** @var string */
    public $foo;

    /** @var int */
    protected $bar;

    /** @var float */
    private $baz;

    /**
     * Constructor
     *
     * @param string $foo
     * @param int    $bar
     * @param float  $baz
     */
    public function __construct(string $foo, int $bar, float $baz)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;
    }

    /**
     * @return string
     */
    public function getFoo(): string
    {
        return $this->foo;
    }

    /**
     * @return int
     */
    public function getBar(): int
    {
        return $this->bar;
    }

    /**
     * @return float
     */
    public function getBaz(): float
    {
        return $this->baz;
    }
}
