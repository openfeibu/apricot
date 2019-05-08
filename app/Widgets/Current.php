<?php namespace App\Widgets;

use Tree;
use Request;
use Teepluss\Theme\Theme;
use Teepluss\Theme\Widget;
use App\Models\NavCategory;
use App\Models\Nav;

class Current extends Widget {

    /**
     * Widget template.
     *
     * @var string
     */
    public $template = 'current';

    /**
     * Watching widget tpl on everywhere.
     *
     * @var boolean
     */
    public $watch = false;

    /**
     * Arrtibutes pass from a widget.
     *
     * @var array
     */
    public $attributes = array();

    /**
     * Turn on/off widget.
     *
     * @var boolean
     */
    public $enable = true;

    /**
     * Code to start this widget.
     *
     * @return void
     */
    public function init(Theme $theme)
    {

    }

    /**
     * Logic given to a widget and pass to widget's view.
     *
     * @return array
     */
    public function run()
    {
        $url = '/'.Request::path();

        $nav = Nav::where('url',$url)->first();

        $parent_nav = [];

        if($nav && $nav->parent_id)
        {
            $parent_nav = Nav::where('id',$nav->parent_id)->first();
        }
        $this->setAttribute('nav',$nav);
        $this->setAttribute('parent_nav',$parent_nav);

        $attrs = $this->getAttributes();

        return $attrs;
    }

}