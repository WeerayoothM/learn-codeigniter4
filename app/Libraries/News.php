<?php namespace App\Libraries;

class News {
    public function newsItem($news_item){
        // var_dump($news_item);
        return view('components/news_item',['news_item'=>$news_item]);
    }
}