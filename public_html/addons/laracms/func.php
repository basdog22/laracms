<?php


Event::listen('laracms.collect.content.types', function () {
    return array(
        array(
            'type'  =>  'pages',
            'title' =>  'Pages',
            'slug'  =>  'page',
            'model' =>  'Pages'
        ),

    );
}, 1);

Event::listen('backend.widgets.create', function () {
    return array(
        'laracms/extends/backend/widgets'
    );
}, 1);


Event::listen('backend.sidebar.create', function () {
    return array(
        'laracms/extends/backend/sidebarmenu'
    );
}, 1);

Event::listen('backend.navbar.create', function () {
    return array(
        'laracms/extends/backend/tools'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'laracms/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'laracms/extends/backend/header'
    );
}, 1);

Event::listen('laracms.pages.all', function ($params) {
    return Pages::all();
}, 1);


Event::listen('laracms.main.content', function ($params) {
    return Config::get('cms.controller.content');
}, 1);

Event::listen('laracms.pages.last', function ($params) {
    return Pages::orderby('created_at', 'desc')->first();
}, 1);

Event::listen('laracms.menus.specific', function ($params) {
    $menu = Menus::find($params['menuid']);
    $it = $menu->menuitems;
    $items = array();
    foreach($it as $k=>$ti){
        $items[$k] = $ti;
        if($ti->model!=''){
            $model = $ti->model;
            $items[$k]->subs = $model::all();

        }

    }

    return array(
        'menu'  =>  $menu,
        'items' =>  $items
    );
}, 1);


Event::listen('content.blocks.collect', function () {
    $blocks = Config::get('cms.contentblocks');
    $blocks = (is_array($blocks)) ? $blocks : array();
    $blocks = array_merge($blocks, array(
        'larapages' => array(
            'block_title' => 'Pages',
            'events_to_fire' => array(
                'laracms.pages.all' => 'All Pages',
                'laracms.pages.last' => 'Last Page'
            ),
            'views_path' => array(
                'laracms/views/pages/blocks/links' => 'Links',
                'laracms/views/pages/blocks/full' => 'Full'
            ),
        ),
        'maincontroller' => array(
            'block_title' => 'Main Content',
            'events_to_fire' => array(
                'laracms.main.content' => 'Load Main Content',
            ),
            'views_path' => array(
                'laracms/views/main/maincontent' => 'Default'
            ),
        ),
        'laramenus' => array(
            'block_title' => 'Menus',
            'params'    =>  array(
                array(
                    'type'  =>  'select',
                    'name'  =>  'menuid',
                    'label' =>  'Select Menu',
                    'options'=> Menus::getForSelect()
                ),
            ),
            'events_to_fire' => array(
                'laracms.menus.specific' => 'Specific Menu',
            ),
            'views_path' => array(
                'laracms/views/menus/blocks/specific' => 'Default'
            ),
        )
    ));
    Config::set('cms.contentblocks', $blocks);
}, 1);
