<?php

include_once('./Node.php');

class LinkedList
{
    private $root;

    private $size = 0;

    public function add($value)
    {
        $newNode = new Node($value);

        $currentRoot = $this->root;

        if (!$this->root) {
            $this->root = $newNode;
            $this->size++;

            $newNode->setKey($this->size);
        }

        while ($currentRoot) {

            if (!$currentRoot->getNext()) {
                $currentRoot->setNext($newNode);

                $this->size++;

                $newNode->setKey($this->size);

                break;
            }

            $currentRoot = $currentRoot->getNext();
        }

    }

    public function getLength()
    {
        return $this->size;
    }

    public function remove($key)
    {
        $prevRoot = null;

        $currentRoot = $this->root;
        while ($currentRoot) {

            if ($currentRoot->getKey() == $key) {

                $nextLink = $currentRoot->getNext();

                $prevRoot->setNext($nextLink);

                $this->size--;
            }

            $prevRoot = $currentRoot;
            $currentRoot = $currentRoot->getNext();
        }
    }

    public function reverseLinkedList()
    {
        $prevNode = null;
        $currentRoot = $this->root;

        while ($currentRoot) {

            $tmp = $currentRoot->getNext();

            $currentRoot->setNext($prevNode);

            $prevNode = $currentRoot;

            $this->root = $currentRoot;

            $currentRoot = $tmp;
        }
    }
}