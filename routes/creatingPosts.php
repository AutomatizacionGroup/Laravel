
<?php


for ($id=100; $id<100000; $id++ ) {
    $post = App\Post::onlyTrashed($id);
    $post->forceDelete();
    echo $id;
}