<?php

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

Event::listen('laracms.pages.all', function () {
    Config::set('cms.blockdata.larapages',Pages::all());
}, 1);


Event::listen('laracms.pages.last', function () {
    Config::set('cms.blockdata.page',Pages::orderby('created_at','desc')->first());
}, 1);


Event::listen('content.blocks.collect', function () {
    $blocks = Config::get('cms.contentblocks');
    $blocks = (is_array($blocks))?$blocks:array();
    $blocks = array_merge($blocks,array(
        'larapages' =>  array(
            'block_title' => 'Pages',
            'events_to_fire' => array(
                'laracms.pages.all' => 'All Pages',
                'laracms.pages.last' => 'Last Page'
            ),
            'views_path'     =>  array(
                'laracms/views/pages/blocks/links' => 'Links',
                'laracms/views/pages/blocks/full' => 'Full'
            ),

        )
    ));
    Config::set('cms.contentblocks',$blocks);
}, 1);

