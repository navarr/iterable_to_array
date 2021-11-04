<?php

/**
 * Copyright (C) 2021 Navarr T. Barnier.  All rights reserved.
 * Licensed under MIT License.
 */

declare(strict_types=1);

namespace Navarr\Utils;

use ArrayIterator;
use PHPStan\BetterReflection\Reflection\Adapter\ReflectionClass;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

class IterableToArrayTest extends TestCase
{
    public function testConvertWithArray()
    {
        $array = ['a', 'b'];
        $this->assertEquals($array, IterableToArray::convert(['a', 'b']));
    }

    public function testConvertWithIterator()
    {
        $iterator = new ArrayIterator(['a', 'b']);
        $this->assertEquals(['a', 'b'], IterableToArray::convert($iterator));
    }

    public function testConvertWithIteratorPreservesKeys()
    {
        $iterator = new ArrayIterator(['a' => 'b']);
        $result = IterableToArray::convert($iterator);
        $this->assertEquals(['a' => 'b'], $result);
        $this->assertNotEquals(['b'], $result);
    }

    public function testConvertWithIteratorDoesNotPreserveKeys()
    {
        $iterator = new ArrayIterator(['a' => 'b']);
        $result = IterableToArray::convert($iterator, false);
        $this->assertEquals(['b'], $result);
        $this->assertNotEquals(['a' => 'b'], $result);
    }

    /**
     * @dataProvider fallbackDataProvider
     */
    public function testFallback(iterable $iterator, bool $preserve_keys, array $expectedResult)
    {
        $reflectionMethod = new ReflectionMethod(IterableToArray::class, 'fallbackConvert');
        $reflectionMethod->setAccessible(true);
        $result = $reflectionMethod->invoke(null, $iterator, $preserve_keys);

        $this->assertEquals($expectedResult, $result);
    }

    public function fallbackDataProvider(): array
    {
        return [
            'Array w/ keys' => [
                ['a' => 'b', 'b' => 'c'],
                true,
                ['a' => 'b', 'b' => 'c'],
            ],
            'Array w/out keys' => [
                ['a' => 'b', 'b' => 'c'],
                false,
                ['b', 'c'],
            ],
            'Iterable w/ keys' => [
                new ArrayIterator(['a' => 'b', 'b' => 'c']),
                true,
                ['a' => 'b', 'b' => 'c'],
            ],
            'Iterable w/out keys' => [
                new ArrayIterator(['a' => 'b', 'b' => 'c']),
                false,
                ['b', 'c'],
            ],
        ];
    }
}
