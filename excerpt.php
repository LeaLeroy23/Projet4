  //limite la taille d'un texte pour description
  public function addFilter($nb, $data){
    if ($data > $num){
      return
    }
  } 

    /* Change Excerpt length */
  function custom_excerpt_length( $length ) {
  return 30;
  }
  add_filter( ‘excerpt_length’, ‘custom_excerpt_length’, 999 );

  }