<?php

// registering header, utility and footer menus
function pstroot_register_menus()
{
    register_nav_menus(
        array(
          'primary-nav' => __('Primary Nav', 'pstroot'),
          'utility-nav' => __('Utility Nav', 'pstroot'),
          'footer' => __('Footer Navigation', 'pstroot')
        )
    );
}
add_action('after_setup_theme', 'pstroot_register_menus');



/**
 * Pstroot_Nav_Menu
 *
 * Does a couple things:
 *  1) it wraps sub-menu lists in a <div class='sub-menu-wrap'> element. This allows
 *     for better positioning of the sub-menu, and is intregal if you want to animate
 *     slide up/down, or if you want a mega-menu.
 *  2) It improves accessibility by adding aria attributes to the menu items. If a prent menu item
 *     links to "#", the entire element is made into a button. If it has a link and children, the
 *     dropdown arrow button is separated from the link.
 */
class Pstroot_Nav_Menu extends Walker_Nav_Menu
{
    private $curItem;

    function start_lvl( &$output, $depth = 0, $args = array() )
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap' id='id_".$this->curItem->ID."_menu'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() )
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $this->curItem = $item;
        $indent = ( $depth ) ? str_repeat("\t", $depth) : "";

        $class_names = $value = "";

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : "";

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title'] = ! empty($item->attr_title) ? $item->attr_title : "";
        $atts['target'] = ! empty($item->target) ? $item->target : "";
        $atts['rel'] = ! empty($item->xfn) ? $item->xfn : "";
        $atts['href'] = ! empty($item->url) ? $item->url : "";

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = "";
        $linkSrc='';
        foreach ( $atts as $attr => $value ) {
            if (! empty($value) ) {
                if('href' === $attr) { $linkSrc = $value;
                }
                $value = ( 'href' === $attr ) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        if($args->walker->has_children && $linkSrc === "#") {
            $item_output .= '<button'. $attributes .' class="nav-link" aria-expanded="false" aria-label="'.$item->title.'" aria-controls="id_'.$item->ID.'_menu">';

        } else {
            $item_output .= '<a'. $attributes .' class="nav-link">';
        }

        $item_output .= '<span>'.$args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</span>';

        if($args->walker->has_children && $linkSrc === "#") {
            $item_output .= sprintf('<span class="arrow"></span>');
            $item_output .= '</button>';
        } else {
            $item_output .= '</a>';
        }

        if($args->walker->has_children && $linkSrc !== "#") {
            $item_output .= sprintf('<button class="arrow" aria-label="Expand '.$item->title.'" aria-expanded="false" aria-controls="id_'.$item->ID.'_menu"></button>');
        }


        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

