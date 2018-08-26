<?php
declare(strict_types=1);

namespace BlackBonjour\ToArray;

/**
 * To array trait
 *
 * @author    Erick Dyck <info@erickdyck.de>
 * @since     26.08.2018
 * @package   BlackBonjour\ToArray
 * @copyright Copyright (c) 2018 Erick Dyck
 */
trait ToArrayTrait
{
    /**
     * Converts current object to array
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = (array) $this;

        array_walk($data, function (&$value) {
            if (\is_object($value)) {
                $value = method_exists($value, 'toArray') ? $value->toArray() : (array) $value;
            }
        });

        return $data;
    }
}