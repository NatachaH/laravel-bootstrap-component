<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modal Confirm
    |--------------------------------------------------------------------------
    |
    | Here you may specify the classes of each button for the Modal Confirm component
    |
    */

    'modal-confirm' => [
      'buttons' => [
        'cancel'  => [
          'class' => 'btn-outline-secondary',
          'label' => 'bs-component::button.cancel',
          'value' => 'bs-component::button.cancel',
        ],
        'confirm'  => [
          'class' => 'btn-', // The color of the button is defined by the component option
          'label' => 'bs-component::button.confirm',
          'value' => 'bs-component::button.confirm',
        ]
      ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Dynamic Form
    |--------------------------------------------------------------------------
    |
    | Here you may specify the classes of each button for the Dynamic component
    |
    */

    'dynamic' => [
      'buttons' => [
        'add'  => [
          'class' => 'btn-primary',
          'label' => 'bs-component::button.add',
          'value' => 'bs-component::button.add',
        ],
        'remove'  => [
          'class' => 'btn-danger',
          'label' => 'bs-component::button.remove',
          'value' => 'bs-component::button.remove',
        ],
        'delete'  => [
          'class' => 'btn-outline-danger',
          'label' => 'bs-component::button.delete',
          'value' => 'bs-component::button.delete',
        ],
        'move'  => [
          'class' => 'btn-info',
          'label' => 'bs-component::button.move',
          'value' => 'bs-component::button.move',
        ]
      ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | Here you may specify the defualt values for the editor
    |
    */

    'editor' => [
      'toolbar'    => ['font','div','format','list','link','color'],
      'headings'   => ['1','2','3'],
      'paragraphs' => ['lead'],
      'divs'       => ['blockquote'],
      'formats'    => ['bold','italic','underline','strike'],
      'colors'     => ['primary','success','warning','danger'],
      'emojis'     => ['bi-emoji-smile','bi-emoji-neutral','bi-emoji-frown','bi-emoji-heart-eyes','bi-emoji-wink','bi-hand-thumbs-up','bi-hand-thumbs-down']
    ],



];
