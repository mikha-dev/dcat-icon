<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Models\SvgIcon;
use Dcat\Admin\Grid\Displayers\Actions;
use Dcat\Admin\ToolButtons\RegenerateCssToolButton;

class SvgIconController extends AdminController
{
    protected $title = 'Svg Icons';

    protected function grid() {
        return function (Row $row) {  $row->column(8, $this->_grid());};
    }

    protected function _grid()
    {
        return new Grid( new SvgIcon(), function (Grid $grid) {

            $grid->model()->where(function($query) {
                return $query->where('domain_id', Admin::domain()->id)->orWhereNull('domain_id');
            });

            $grid->column('_icon')->display(function() {
                /** @var SvgIcon $this */
                return "<i class=\"fa icon-svg $this->name\"></i>";
            });

            $grid->column('name');

            $grid->disableFilterButton();
            $grid->disableRefreshButton();
            $grid->disableViewButton();

            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new RegenerateCssToolButton(__('regenerate_css')));
            });

            $grid->actions(function(Actions $actions) {
                if(is_null($actions->row->domain_id)) {
                    $actions->disableDelete();
                    $actions->disableEdit();
                }
            });
        });
    }

    protected function form()
    {
        return new Form( new SvgIcon(), function (Form $form) {
            $form->hidden('domain_id')->value(Admin::domain()->id);

            $form->text('name')->required();
            $form->textarea('icon')->required();

            $form->disableViewButton();

            $form->deleting(function(Form $form) {
                $items = $form->model()->toArray();

                foreach($items as $item) {
                    if( is_null(SvgIcon::find($item['id'], ['domain_id'])->domain_id) ) {
                        return $form->response()->error('Can`t remove system icon'.$item['id']);
                    }    
                }
            });

            $form->saved(function(Form $form) {
                SvgIcon::generateCss();
            });
        });
    }
}