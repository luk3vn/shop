<?php

namespace Terranet\Shop\Modules;

use App\Shop\Orders\Order;
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
 * Administrator Resource Orders
 *
 * @package Luxstyle\Administrator
 */
class Orders extends Scaffolding implements Navigable, Filtrable, Editable, Validable, Sortable, Exportable
{
    use HasFilters, HasForm, HasSortable, ValidatesForm, AllowFormats;

    /**
     * The module Eloquent model
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Module title
     *
     * @return string
     */
    public function title()
    {
        return "List";
    }

    /**
     * Navigation group
     *
     * @return string
     */
    public function group()
    {
        return "Orders";
    }

    /**
     * News form
     *
     * @return mixed
     */
    public function form()
    {
	    
	    return $this->scaffoldForm();

    }

}
