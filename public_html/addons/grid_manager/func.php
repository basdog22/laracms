<?php

Event::listen('backend.widgets.create', function () {
    return array(
        //'laramce/extends/backend/widgets'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'grid_manager/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'grid_manager/extends/backend/header'
    );
}, 1);

Event::listen('backend.addons.saveaddoninfo', function ($addon) {
    Schema::create('gridmanager', function($table)
    {
        $table->increments('id');

        $table->timestamps();
		
    });
}, 1);