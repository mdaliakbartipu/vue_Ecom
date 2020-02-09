<?php
// This Class if for UI pages Modeling

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class UI extends Model
{

    public static function getALL(){
        return DB::table('sliders')->get();
    }

    public static function getAllBanners(){
        return DB::table('banners')->get();
    }

    public static function getAllPromotions(){
        return DB::table('promotions')->get();
    }

    public static function getBlogs(int $limit = 3){
        return DB::table('blogs')->orderBy('id','desc')->take($limit)->get();
    }

    public static function getThreeBlogs(){

        $blogs = self::getBlogs(3);
        
        foreach($blogs as &$blog){
            $blog->author_name = DB::table('users')->where('id', $blog->author_id)->pluck('name')->first();
        }
        
        return $blogs;
    }

    public static function getFourBlogsWithoutThis(Blog $blog){

        $blogs = DB::table('blogs')->where('id' , '!=' ,$blog->id)->orderBy('id','desc')->take(4)->get();
        
        foreach($blogs as &$blog){
            $blog->author_name = DB::table('users')->where('id', $blog->author_id)->pluck('name')->first();
        }
        
        return $blogs;
    }

    public static function getBlog(Blog $blog)
    {
        $blog->author_name = DB::table('users')->where('id', $blog->author_id)->pluck('name')->first();
        return $blog;
    }
    public static function getTestimonials(){
        return DB::table('testimonials')->orderBy('id','desc')->take(2)->get();
    }

}
