<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    public $timestamps = false;

    public static function saveTags($tags, $productID = null)
    {
        if($productID??null && $tags??null): 
            foreach( $tags as $tag){
                $save = ProductTags::saveTag($tag , $productID);
                if(!$save) return false;
            }
            return true;
        endif;
        return false;
    }

    public static function updateTags($tags, $productID = null)
    {
        if($productID && $tags): 
            // deleting previous tags
            ProductTags::deleteTags($productID);
            // inserting new tags
            foreach( $tags as $tag){
                $update = ProductTags::saveTag($tag , $productID);
                if(!$update) return false;
            }
            return true;
        endif;
        return false;
    }

    public static function saveTag($tag, $productID = null)
    {
        if($productID??null && $tag??null): 
                $ptag = new ProductTags;
                $ptag->product_id    = $productID;
                $ptag->tag_id        = $tag;  
                return $ptag->save();
        else: 
            return false;
        endif;
    }

    public static function deleteTags($productID = null)
    {   
        if($productID??null): 
            // deleting tags
            while($tag = ProductTags::where('product_id', $productID)
                        ->first()): 
                $tag->delete();
            endwhile;
        endif;
    }


}
