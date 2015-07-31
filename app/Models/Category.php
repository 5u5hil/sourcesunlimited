<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Baum\Node;

class Category extends Node implements SluggableInterface {

    protected $table = 'categories';

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'category',
        'save_to' => 'url_key',
    );

     protected $orderColumn = "sort_order";
    
}
