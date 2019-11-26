<?php

namespace Sequence;

interface SequenceInterface {

    public function __construct(array $array);

    public function setNumbers(array $array);

    public function getNumbers();

    public function getMaxNumbers($count);

    public function getLastResult();
}