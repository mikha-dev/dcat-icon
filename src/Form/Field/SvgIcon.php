<?php

namespace Dcat\Admin\Form\Field;

use Dcat\Admin\Admin;
use Dcat\Admin\Form\Field\Text;
use Dcat\Admin\Models\SvgIcon as Model;

class SvgIcon extends Text
{
    protected $view = 'mikha-dev.dcat-svg-icon::index';

    public function render()
    {
        $this->defaultAttribute('autocomplete', 'off')
            ->defaultAttribute('style', 'width: 160px;flex:none');

        $this->addVariables(['icons' => Model::where(function($query) {
            return $query->where('domain_id', Admin::domain()->id)->orWhereNull('domain_id');
        })->get()]);

        return parent::render();
    }
}
