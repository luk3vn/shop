<?php

namespace Terranet\Shop\Modules;

use App\Shop\Categories\Category;
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
 * Administrator Resource NewsCategories
 *
 * @package Terranet\Administrator
 */
class Categories extends Scaffolding implements Navigable, Filtrable, Editable, Validable, Sortable, Exportable
{
    use HasFilters, HasForm, HasSortable, ValidatesForm, AllowFormats;

    /**
     * The module Eloquent model
     *
     * @var string
     */
    protected $model = Category::class;


    public function title()
    {
        return "Categories";
    }

    public function group()
    {
        return "Products";
    }

    protected function inputTypes()
    {
      return ['description' => 'tinymce'];
    }


    public function form()
    {
        return $this->scaffoldForm()
          //->without(['slug'])
          ->update('status',function ($element){

            $element->setInput('select')
              ->setOptions(Category::$statuses);
          });
    }

}