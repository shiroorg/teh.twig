<?php

// Подключаем классы
include 'Sequence/SequenceInterface.php';
include 'Sequence/SequenceClass.php';

use Sequence\SequenceClass as SequenceClass;

/*
 * В ТЗ не было указано о входных параметрах,
 * по этому предположим чтобы у нас "всегда массив" на входе.
 */

$FirstArray = [1,4,2,7,4,23,7,3,23,87,43,24,87,32];
$LastArray = [1,2,10,4,5,12,6,7,8,0,9,11,12];

$SequenceClass = new SequenceClass($FirstArray);

// Включаем логирование
$SequenceClass->logs = true;

print_r($SequenceClass->getMaxNumbers());//[87]
print_r($SequenceClass->getMaxNumbers(2));//[87,43]

// Используем тот же класс без пересоздания
$SequenceClass->setNumbers($LastArray);

print_r($SequenceClass->getMaxNumbers(4));// [12,11,10,9]

