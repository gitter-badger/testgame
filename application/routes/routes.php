<?php
return [
    // [ method, route, controller, action ]

    ['post', '/game', 'game', 'create'],
    ['post', '/location', 'location', 'createAction'],

    // CRUD routes (should be at the end)
    ['get',     '/:model/:id',  'crud', 'showAction'],
    ['get',     '/:model',      'crud', 'listAction'],
    ['post',    '/:model',      'crud', 'createAction'],
    ['delete',  '/:model/:id',  'crud', 'deleteAction'],
    ['update',  '/:model/:id',  'crud', 'updateAction'],
];