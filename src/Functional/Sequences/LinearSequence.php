<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

namespace Functional\Sequences;

use Functional\Exceptions\InvalidArgumentException;
use Iterator;

/** @internal */
class LinearSequence implements Iterator
{
    /** @var integer */
    private $start;

    /** @var integer */
    private $amount;

    /** @var integer */
    private $value;

    public function __construct($start, $amount)
    {
        InvalidArgumentException::assertIntegerGreaterThanOrEqual($start, 0, __METHOD__, 1);
        InvalidArgumentException::assertInteger($amount, __METHOD__, 2);

        $this->start = $start;
        $this->amount = $amount;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->value;
    }

    public function next(): void
    {
        $this->value += $this->amount;
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return 0;
    }

    public function valid(): bool
    {
        return true;
    }

    public function rewind(): void
    {
        $this->value = $this->start;
    }
}
