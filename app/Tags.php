<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tags extends Model
{
    // type should be eithre 'page' or 'product
    public $type                 = null;
    public $tag_id              = null;
    public $product_id     = null;
    public $page_id           = null;

    public static function forPage()
    {
        return Tags::where('type', 'page')->get();
    }
    

    public static function forProduct()
    {
        return Tags::where('type', 'product')->get();
    }

    public function pin()
    {

        if( !$this->tag_id  || !$this->page_id){
            return false;
        }

        if($this->type == 'page'):
            $tag = DB::table('page_tags')->insert(
                [
                    'tag_id' => $this->tag_id, 
                    'page_id' => $this->page_id
                ]
            );
        endif;
    }

    public function product(){
        return  $this->belongsToMany('App\Product','products');
   }

}
