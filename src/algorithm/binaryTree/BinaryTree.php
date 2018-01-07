<?php

include_once('./Node.php');

class BinaryTree
{
    private $root;

    public function add($key, $value)
    {
        $newNode = new Node($key, $value);

        $currentRoot = $this->root;

        $lastElement = null;

        if (!$this->root) {
            $this->root = $newNode;
        } else {
            while ($currentRoot) {

                if ($currentRoot->getKey() == $key) {
                    $currentRoot->setValue($value);
                    break;
                } else {

                    $lastElement = $currentRoot;

                    if ($currentRoot->getKey() > $key) {
                        $currentRoot = $currentRoot->getLeft();
                    } else {
                        $currentRoot = $currentRoot->getRight();
                    }
                }
            }

            if ($key > $lastElement->getKey()) {
                $lastElement->setRight($newNode);
            } else {
                $lastElement->setLeft($newNode);
            }
        }
    }

    public function get($key)
    {
        $currentRoot = $this->root;
        while ($currentRoot) {

            if ($key == $currentRoot->getKey()) {
                return $currentRoot->getValue();
            }

            if ($key > $currentRoot->getKey()) {
                $currentRoot = $currentRoot->getRight();
            } else {
                $currentRoot = $currentRoot->getLeft();
            }
        }

        return null;
    }
}