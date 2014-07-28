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

