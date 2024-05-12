<?php

namespace App\Game;

use ReflectionClass;

abstract class BasicEnum
{
    private ?array $constCacheArray = null;

    protected function getConstants(): array
    {
        if (is_null($this->constCacheArray)) {
            $this->constCacheArray = [];
        }

        $called = get_called_class();

        if (! array_key_exists($called, $this->constCacheArray)) {
            $reflection = new ReflectionClass($called);
            $this->constCacheArray[$called] = $reflection->getConstants();
        }

        return $this->constCacheArray[$called];
    }

    public function isValidName(string $name, bool $strict = false): bool
    {
        $constants = $this->getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));

        return in_array(strtolower($name), $keys);
    }

    protected function isValidValue(string $value, bool $strict = false): bool
    {
        $values = array_values($this->getConstants());

        return in_array($value, $values, $strict);
    }
}
