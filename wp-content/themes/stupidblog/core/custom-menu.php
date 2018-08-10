<?php
/**
 * Create: Nghia
 * Edit:[Nghia]
 * Ver: 1.0.0
 */
class Bootstrap_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * <ul> -- start_lvl
     *      <li> -- start_el
     *          <a>something3</a>
     *      </li>
     *      <li> -- end_el
     *          <a>something3</a>
     *      </li>
     * </ul> -- end_lvl
     */
    // Change class of element <li> and <a>
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
        }
        $class_names = ' class="nav-item" ';
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
        $output .= $indent . '<li'. $class_names .'>';
        $atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
        }
        $class_names = ' class ="nav-link hi-nav-link" ';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        $item_output = $args->before;
        $item_output .= '<a'.$class_names. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
    }
}
