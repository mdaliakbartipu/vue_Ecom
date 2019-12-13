<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    public $timestamps = false;

    public function saveTags($tags, $productID = null)
    {
        if($productID??null && $tags??null): 
            foreach( $tags as $tag){
                $ptag = new ProductTags;
                $ptag->product_id    = $productID;
                $ptag->tag_id        = $tag;  
                $ptag->save();
            }
        
        endif;
    }

}
