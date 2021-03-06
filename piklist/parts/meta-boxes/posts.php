<?php

/*
Title: Medor Aktualności
Post Type: post
Context: side
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => 'post_image'
    ,'scope' => 'post_meta'
    ,'label' => 'Obrazek postu'
    ,'options' => array(
      'modal_title' => 'Add File(s)'
      ,'preview_size' => 'small'
      ,'button' => 'Add'
      ,'multiple' => false // must be boolean, not string
      )
      ,'validate' => array(
        array(
          'type' => 'limit'
          ,'options' => array(
            'min' => 0
            ,'max' => 1
          )
          ,'message' => 'Przykro mi, ale można dodać tylko jedno zdjęcie w danej sekcji. Jedno "dodaj" to jedno zdjęcie :)'
        )
      )
    ,'attributes' => array(
        'wrapper_class' => 'post_content'
        ,'style' => 'width: 100%'
        ,'contex' => 'side'
      )
  ));
