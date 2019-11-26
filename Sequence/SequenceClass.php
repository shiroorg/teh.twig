<?php

namespace Sequence;

use Sequence\SequenceInterface;

class SequenceClass implements SequenceInterface {

    private $array;
    private $result;

    public $logs = false;

    /***
     * SequenceClass constructor.
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->setNumbers($array);
    }

    /***
     * Принимает массив данных, сортирует и убирает дубликаты
     * @param array $array
     */
    public function setNumbers(array $array)
    {
        arsort($array);
        $this->array = array_unique($array);

        if($this->logs) {
            $this->inputLogs(__METHOD__, $this->array);
        }
    }

    /***
     * Выводит массив текущей последовательности
     * @return array
     */
    public function getNumbers()
    {
        return $this->array;
    }

    /***
     * Возвращающий (count) самых больших чисел последовательности
     * @param integer $count
     * @return array
     */
    public function getMaxNumbers($count = 1)
    {
        $this->result = array_chunk($this->getNumbers(), $count)[0];

        if($this->logs) {
            $this->inputLogs(__METHOD__, $this->result);
        }

        return $this->result;
    }

    /***
     * Возвращает последний успешный результатж
     * @return mixed
     */
    public function getLastResult()
    {
        return $this->result;
    }

    private function inputLogs($Method, $Content) {

        if(is_array($Content)) {
            $Content = json_encode($Content);
        }

        $filename = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR .'logs_'.date('y_m_d', time()). '.logs';

        // Создаем файл если его нету
        if(!file_exists($filename)) {
            $fp = fopen($filename, "w");
            fwrite($fp, " ");
            fclose($fp);
        }

        // Получаем файл со всем содержимым
        $current = file_get_contents($filename);
        $current .= "\n $Method " . $Content;

        // Записываем данные в файл
        file_put_contents($filename, $current);

    }

}