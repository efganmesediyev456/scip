<?php

return [
    'subdomain' => env('ADMIN_SUBDOMAIN', ''),
    'prefix' => env('MIX_ADMIN_PREFIX', 'admin'),

    'roles' => [
        'admin' => [
            'list-admins' => true,
            'create-admin' => true,
            'delete-admin' => true,
            'edit-admin' => true,
            'reset-admin–password' => true,
            'list-fields' => true,
            'create-field' => true,
            'edit-field' => true,
            'delete-field' => true,
            'list-field-values' => true,
            'create-field-values' => true,
            'edit-field-values' => true,
            'delete-field-values' => true,
            'list-post-fields' => true,
            'list-post-columns' => true,
            'list-posts' => true,
            'create-post' => true,
            'update-post' => true,
            'delete-post' => true,
            'list-pages' => true,
            'list-page-fields' => true,
            'create-page' => true,
            'update-page' => true,
            'publish-page' => true,
            'hide-page' => true,
            'read-settings' => true,
            'update-settings' => true,
            'list-redirects' => true,
            'create-redirect' => true,
            'delete-redirect' => true
        ]
    ]
];
