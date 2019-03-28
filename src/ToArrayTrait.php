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
     * @param array   $data
     * @param boolean $convertSubObjects
     * @return array
     */
    private function handleArray(array $data, bool $convertSubObjects): array
    {
        foreach ($data as $prop => &$value) {
            if ($convertSubObjects && \is_object($value)) {
                $value = method_exists($value, 'toArray') ? $value->toArray() : (array) $value;
            } elseif (is_array($value)) {
                $value = $this->handleArray($value, $convertSubObjects);
            }

            if (strpos((string) $prop, "\0") !== false) {
                unset($data[$prop]);

                $tmp         = explode("\0", $prop);
                $prop        = end($tmp);
                $data[$prop] = $value;
            }
        }

        return $data;
    }

    /**
     * Converts current object to array
     *
     * @param boolean $convertSubObjects
     * @return array
     */
    public function toArray(bool $convertSubObjects = true): array
    {
        return $this->handleArray((array) $this, $convertSubObjects);
    }
}
