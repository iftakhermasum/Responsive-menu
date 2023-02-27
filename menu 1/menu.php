<?php
/*********
 ** Use This code into Header section
 ***/
    wp_nav_menu( array(
      'theme_location' => 'top_menu', 
      'menu_id' => 'nav'
    )); 
?>




<?php
// Add register navigation menus code and Walker function code into functions.php file

register_nav_menus( array(
	'newone_primary'   => __( 'First Menu', 'newone' ),
	'newone_secondary' => __( 'Secondary Menu', 'newone' ),
) );



/*********
 ** Use of the Walker function code for showing menu descrition
 ***/
 
//(1) Walker function 
	add_filter('walker_nav_menu_start_el', 'add_description_to_menu_item', 10, 4);

	function add_description_to_menu_item($item_output, $item, $depth, $args) {
	if (!empty($item->description)) {
			$item_output .= '<span class="menu-item-description">' . $item->description . '</span>';
		}
		return $item_output;
	}



//(2) Walker function
	add_filter('walker_nav_menu_start_el', 'ali_nav_description', 10, 3);

	function ali_nav_description( $item_output, $item, $args){
	  if( !empty ($item->description)){
	    $item_output = str_replace('</a>', '<span class="walker_nav">' . $item->description . '</span>' . '</a>', $item_output);
	  }
	  return $item_output;
	}


 
//(3) Walker function
	add_filter( 'walker_nav_menu_start_el', 'nav_menu_description', 10, 4 );

	function nav_menu_description( $item_output, $item, $depth, $args ) {
	    if ( !empty( $item->description ) ) {
	        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
	    }
	  
	    return $item_output;
	}




<style>
	.menu-item-description {
	    display: block !important;
	    font-size: 13px !important;
	    font-weight: normal !important;
	}
</style>
