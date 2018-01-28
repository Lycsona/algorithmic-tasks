<?php

class BinaryGap
{
    private $keys = [];

    private $array = [];

    private $gaps = [];

    private $index = 0;

    public function __construct(int $number)
    {
        $this->array = $this->convertToArray($number);
    }

    public function getKeys(): array
    {
        return $this->keys;
    }

    public function getArray(): array
    {
        return $this->array;

    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index)
    {
        $this->index = $index;
    }

    public function getGaps()
    {
        return $this->gaps;
    }

    public function setGaps($allGaps)
    {
        $this->gaps[] = $allGaps;
    }

    public function setKeys(array $keys)
    {
        $this->keys = $keys;
    }

    public function setArray(array $array)
    {
        $this->array = $array;
    }

    public function getBinaryGap(): int
    {
        $this->setKeys($this->searchOnes());

        $keys = array_reverse(array_keys($this->getKeys()));

        $this->getGap($keys);

        return max($this->getGaps());
    }

    private function convertToBinary(int $number): string
    {
        return decbin($number);
    }

    private function convertToArray(int $number): array
    {
        return str_split($this->convertToBinary($number));
    }

    private function searchOnes()
    {
        return array_filter($this->getArray());
    }

    private function getGap($keys)
    {
        while (count($keys) > 1) {
            $index = $this->getIndex();

            $this->setIndex($this->getIndex() + 1);

            if (count($keys) >= 2) {
                $gap = $keys[$index] - $keys[$index + 1] - 1;
                $this->setGaps($gap);
            }

            unset($keys[$index]);

            return $this->getGap($keys);
        }
    }
}

$example = new BinaryGap(1041);

var_dump($example->getBinaryGap());