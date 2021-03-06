<?php
/*
Title: Medor Home Page
Template: page-templates/page-home
*/


  piklist('field', array(
    'type' => 'file'
    ,'field' => 'parallax'
    ,'scope' => 'post_meta'
    ,'label' => 'Obrazek Parallaxy'
    ,'description' => 'Obrazek o rozmiarach 1920px × 1280px'
    ,'options' => array(
      'modal_title' => 'Add File(s)'
      ,'preview_size' => 'medium'
      ,'button' => 'Add'
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
    )
  ));

  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'parallax_description'
    ,'scope' => 'post_meta'
    ,'label' => 'Nagłówek Parallaxy'
    ,'attributes' => array(
      'rows' => 5,
      'cols' => 55
      ,
      'class' => 'medium-text'
    )
  ));



piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon1'
  ,'label' => 'Ikona pierwsza'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon1_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon2'
  ,'label' => 'Ikona druga'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon2_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon3'
  ,'label' => 'Ikona trzecia'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon3_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'file'
  ,'field' => 'parallax_second'
  ,'scope' => 'post_meta'
  ,'label' => 'Obrazek dolnej parallaxy'
  ,'description' => 'Obrazek o rozmiarach 1920px × 1280px'
  ,'options' => array(
    'modal_title' => 'Add File(s)'
    ,'preview_size' => 'medium'
    ,'button' => 'Add'
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
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon4'
  ,'label' => 'Ikona czwarta'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon4_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon5'
  ,'label' => 'Ikona piąta'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon5_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'icon6'
  ,'label' => 'Ikona szósta'
  ,'description' => 'Uzupełnij'
  ,'value' => ''

  ,'attributes' => array(
    'class' => 'text'
  )
));

piklist('field', array(
  'type' => 'url',
  'field' => 'icon6_url',
  'label' => 'Link ikony'
  ,'attributes' => array(
'class' => 'regular-text'
  )
));


// Get the value of the field above


    // piklist('field', array(
    //     'type' => 'group', // <== needed
    //     'field' => 'music', // <== optional
    //     'label' => 'Music',
    //     'description' => 'Add songs from this episode',
    //     'add_more' => true,

    //     'fields' => array(
    //         array(
    //             'type' => 'text',
    //             'value' => 'song title',
    //             'field' => 'song_title',
    //             'label' => 'Title', // <== optional
    //         ),
    //         array(
    //             'type' => 'text',
    //             'value' => 'song artist',
    //             'field' => 'song_artist',
    //             'label' => 'Artist', // <== optional
    //         ),
    //         array(
    //             'type' => 'text',
    //             'value' => 'song url',
    //             'field' => 'song_url',
    //             'label' => 'URL', // <== optional
    //         )
    //     )

    // ));
