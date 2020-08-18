<?php

namespace App\Http\Controllers;


use App\Classes\ClosureClass;
use App\Posts;

class ClosureController extends Controller
{
    public function index()
    {
        $post = new Posts();
        $post->title = "title";
        $post->author_id = random_int(1, 999);
        $post->content = "content";
        $post->description = "descriptions";

        ClosureClass::closureWithNoArgs($post, function () {
            echo "closureWithNoArgs";
        });

        $res = $post->save();

        return \Response::json(['res' => $res]);
    }

    public function useUse()
    {
        $post = new Posts();
        $post->title = "title";
        $post->author_id = random_int(1, 999);
        $post->content = "content";
        $post->description = "descriptions";

        ClosureClass::closureWithUse($post, function () use ($post) {

            if ($post->author_id % 2 === 0) {
                echo 'do save';
                $post->save();
            } else {
                echo 'do not save';
            }
        });
    }

    public function useArg()
    {
        $post = new Posts();
        $post->title = "title";
        $post->author_id = random_int(1, 999);
        $post->content = "content";
        $post->description = "descriptions";

        $post_detail = ClosureClass::say(function (string $date) use ($post) {

            if ($post->author_id % 2 === 0) {
                echo 'do save';
                $post->save();
            } else {
                echo 'do not save';
            }

            return "$date: $post->description";
        });


        return \Response::json([
            'res' => $post_detail
        ]);
    }
}
