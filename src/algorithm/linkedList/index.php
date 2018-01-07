<?php

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

include_once('./LinkedList.php');

class Test
{
    public function run()
    {
        $linkedList = new LinkedList();

        $linkedList->add(1);
        $linkedList->add(2);
        $linkedList->add(3);
        $linkedList->add(4);

        $linkedList->remove(3);
        var_dump($linkedList);
    }
}

$test = new Test();
$test->run();