<?php

namespace Dcat\Admin;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Form\Field\Icon;

class SvgIconServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/icon.js',
    ];
	protected $css = [
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		Admin::css(\Storage::disk(config('admin.upload.disk'))->url('icons/icon-svg.css'));

		Form::extend('svgIcon', Icon::class);
//		Form::extend('oIcon', Form\Field\Icon::class);

		Admin::requireAssets('@mikha-dev.svg-icon');

        $this->publishable();
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
