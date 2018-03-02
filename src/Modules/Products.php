<?php

namespace Terranet\Shop\Modules;

use App\Shop\Products\Product;
use Terranet\Administrator\Contracts\Module\Editable;
use Terranet\Administrator\Contracts\Module\Exportable;
use Terranet\Administrator\Contracts\Module\Filtrable;
use Terranet\Administrator\Contracts\Module\Navigable;
use Terranet\Administrator\Contracts\Module\Sortable;
use Terranet\Administrator\Contracts\Module\Validable;
use Terranet\Administrator\Scaffolding;
use Terranet\Administrator\Traits\Module\AllowFormats;
use Terranet\Administrator\Traits\Module\HasFilters;
use Terranet\Administrator\Traits\Module\HasForm;
use Terranet\Administrator\Traits\Module\HasSortable;
use Terranet\Administrator\Traits\Module\ValidatesForm;

/**
 * Administrator Resource News
 *
 * @package Luxstyle\Administrator
 */
class Products extends Scaffolding implements Navigable, Filtrable, Editable, Validable, Sortable, Exportable
{
    use HasFilters, HasForm, HasSortable, ValidatesForm, AllowFormats;

    /**
     * The module Eloquent model
     *
     * @var string
     */
    protected $model = Product::class;
    protected $magnetParams = ['category_id'];

    /**
     * Module title
     *
     * @return string
     */
    public function title()
    {
        return "List product";
    }

    /**
     * Navigation group
     *
     * @return string
     */
    public function group()
    {
        return "Products";
    }

    /**
     * News form
     *
     * @return mixed
     */
    public function form()
    {
	    
	    return $this->scaffoldForm()

        /*
          ->update('body',function ($element){
          $element->setInput('Ckeditor');
        })


        ->update('status',function ($element){

          $element->setInput('select')
            ->setOptions(NewsItem::$statuses);
        })
        ->create('category_id',function ($element){
          $element->setInput('select')
            ->setRelation('categories')
            ->setTitle('Belongs to')
            ->setOptions(['' => '-- Select --'] + NewsCategory::pluck('title', 'id')->toArray())
            ->setMultiple(true);
        })*/;

    }

}
