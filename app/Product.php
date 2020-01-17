<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
    	
    	return $this->belongsTo(category::class);

    }

    // $product->images
    public function images(){

    	return $this->hasMany(ProductImage::class);
    	
    }

    public function getFeaturedImageUrlAttribute(){
    	$featuredImage = $this->images()->where('featured', true)->first();
    	if (!$featuredImage)
    		$featuredImage = $this->images()->first();

    	if ($featuredImage){
    		return $featuredImage->url;
    	}

    	// default
    	return '/images/products/default.png';
    }
}
