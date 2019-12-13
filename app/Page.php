<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PageTags;
use App\Tags;


class Page extends Model
{
    public static function getPageTag($id){
        
        $tag =  PageTags::select('tag_id')->where('page_id', (int)$id)->first();
        
        if($tag->tag_id??null){
            $page_tag = Tags::find($tag->tag_id);
            return $page_tag->name;
        } else {
            return null;
        }
    }

    public static function dataBySlug($slug){
        
        return Page::where('slug', $slug)->first();
    }

}
