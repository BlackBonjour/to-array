<?php
declare(strict_types=1);

namespace BlackBonjourTest\ToArray;

use PHPUnit\Framework\TestCase;

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
        $model       = new ExampleModel('foo', 123, 19.95);
        $expectation = [
            'foo' => 'foo',
            'bar' => 123,
            'baz' => 19.95,
        ];

        self::assertEquals($expectation, $model->toArray());
    }
}
