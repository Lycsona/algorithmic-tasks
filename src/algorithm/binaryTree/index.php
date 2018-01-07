<?php

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

include_once('./BinaryTree.php');

class Test
{
    public function run()
    {
        $binaryTree = new BinaryTree();

        $binaryTree->add(4, 'Maria');
        $binaryTree->add(8, 'Ivan');
        $binaryTree->add(2, 'Stas');
        $binaryTree->add(3, 'Poly');

        var_dump($binaryTree->get(8));
    }
}

$test = new Test();
$test->run();