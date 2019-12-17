<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $table = 'product_variant';

    public static function getVariants($productID = null){
      if($productID):
            $variantsID = array();
            $variants = ProductVariant::where('product_id', $productID)->get();  
            foreach($variants as $variant):
            array_push($variantsID, $variant->id);
            endforeach;
            return $variantsID;
      endif;
      return false;
    }

    public static function deleteThese(Array $ids = null){
        if($ids): 
            foreach($ids as $id):
                $variant = ProductVariant::find((int)$id);
                if($variant):
                $variant->delete();
                endif;
            endforeach;
        endif;
    } 

    public static function getVariant(
                    $productID = null,
                    $sizeID = null,
                    $colorID = null
                    ){
            if($productID && $sizeID && $colorID):  
                $variant = ProductVariant::where([
                            ['product_id', '=', $productID],
                            ['color_id', '=', $colorID],
                            ['size_id', '=', $sizeID]
                        ])->first();
                return $variant??false;
                else:
                    return "Please give me productID & sizeID & colorID";
            endif;
        
           
      }
    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }
}
