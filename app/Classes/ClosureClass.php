<?php


namespace App\Classes;

use app\Posts;

class ClosureClass
{
    private const ARG1 = 'THIS IS ARG1';

    public static function closureWithNoArgs(Posts $posts, \Closure $closure)
    {
        $posts->description .= "___closureWithNoArgs";

        $closure();
    }

    public static function closureWithUse(Posts $posts, \Closure $closure)
    {
        $posts->description .= "___closureWithArgs";

        $closure();
    }

    public static function say(\Closure $closure)
    {
        $date = date('Y-m-d H:i:s');

        return $closure($date);
    }


}
