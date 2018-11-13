<?php
/** @noinspection PhpUnhandledExceptionInspection */
declare(strict_types=1);

namespace BlackBonjourTest\ToArray;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Unit test for to array trait
 *
 * @author    Erick Dyck <info@erickdyck.de>
 * @since     07.09.2018
 * @package   BlackBonjourTest\ToArray
 * @copyright Copyright (c) 2018 Erick Dyck
 */
class ToArrayTraitTest extends TestCase
{
    public function testToArray(): void
    {
        $stdClass      = new stdClass;
        $stdClass->foo = 'FooBar';
        $modelA        = new ExampleModelA('foo', 123, 19.95);
        $modelB        = new ExampleModelB($stdClass, $modelA);
        $expectationA  = [
            'foo' => 'foo',
            'bar' => 123,
            'baz' => 19.95,
        ];

        $expectationB = [
            'modelA' => $expectationA,
            'object' => [
                'foo' => 'FooBar',
            ],
        ];

        $expectationC = [
            'modelA' => $modelA,
            'object' => $stdClass,
        ];

        self::assertEquals($expectationA, $modelA->toArray());
        self::assertEquals($expectationB, $modelB->toArray());
        self::assertEquals($expectationC, $modelB->toArray(false));
    }
}
