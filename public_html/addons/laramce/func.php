<?php

Event::listen('backend.widgets.create', function () {
    return array(
        'laramce/extends/backend/widgets'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'laramce/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'laramce/extends/backend/header'
    );
}, 1);