<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTags extends Model
{
    public function pages()
    {
    	return $this->hasMany(Page::class);
    }
}
