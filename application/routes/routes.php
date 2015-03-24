<?php
return [
    // method, route, controller, action
    ['get', '/hello/:name', 'test', 'hello'],
    ['post', '/azaza', 'test', 'test'],

    ['post', '/game', 'game', 'create'],
    ['post', '/location', 'location', 'create'],

    ['get', '/:model/:id', 'crud', 'showAction'],
    ['get', '/:model', 'crud', 'listAction'],
    ['post', '/:model', 'crud', 'createAction'],
];