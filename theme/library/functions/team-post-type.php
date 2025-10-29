<?php
/**
 * Custom Post Type Example
 * (http://codex.wordpress.org/Function_Reference/register_post_type)
 * This page walks you through creating
 * a custom post type and taxonomies. You
 * can edit this one or copy the following code
 * to create another one.
 *
 * I put this in a separate file so as to
 * keep it organized. I find it easier to edit
 * and change things if they are concentrated
 * in their own file.
 */

// let's create the function for the custom type
function pstroot_projects_post_type()
{
    // creating (registering) the custom type

    register_post_type(
        'team',
        array(
          'labels' => array(
            'name' => __('Team', 'pstroot'), /* This is the Title of the Group */
            'singular_name' => __('Team Member', 'pstroot'), /* This is the individual type */
            'all_items' => __('All Team Members', 'pstroot'), /* the all items menu item */
            'add_new' => __('Add New', 'pstroot'), /* The add new menu item */
            'add_new_item' => __('Add New Team Member', 'pstroot'), /* Add New Display Title */
            'edit' => __('Edit', 'pstroot'), /* Edit Dialog */
            'edit_item' => __('Edit Team', 'pstroot'), /* Edit Display Title */
            'new_item' => __('New Team member', 'pstroot'), /* New Display Title */
            'view_item' => __('View Team', 'pstroot'), /* View Display Title */
            'search_items' => __('Search Team', 'pstroot'), /* Search Custom Type Title */
            'not_found' =>  __('Nothing found in the Database.', 'pstroot'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash', 'pstroot'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
          ), /* end of arrays */
          'description' => __('Custom post type for team members', 'pstroot'), /* Custom Type Description */
          'public' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'show_ui' => true,
          'query_var' => true,
          'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
          'menu_icon'      => 'dashicons-book',
          'rewrite'  => array('slug' => 'team-member', 'with_front' => true), /* you can specify its url slug */
          'has_archive' => 'team', /* you can rename the slug here */
          'capability_type' => 'post',
          'hierarchical' => false,
          'show_in_rest' => true,
          /* the next one is important, it tells what's enabled in the post editor */
          'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt','custom-fields', 'revisions', 'sticky'),


        ) /* end of options */
    ); /* end of register post type */
}
add_action('init', 'pstroot_projects_post_type');



/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

// Add Project categories
register_taxonomy(
    'team_category',
    array('team'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    array(
    'hierarchical' => true,     /* if this is true, it acts like categories */
    'labels' => array(
      'name' => __('Team Categories', 'pstroot'), /* name of the custom taxonomy */
      'singular_name' => __('Team Category', 'pstroot'), /* single taxonomy name */
      'search_items' =>  __('Search Team Categories', 'pstroot'), /* search title for taxomony */
      'all_items' => __('All Team Categories', 'pstroot'), /* all title for taxonomies */
      'parent_item' => __('Parent Team Category', 'pstroot'), /* parent title for taxonomy */
      'parent_item_colon' => __('Parent Team Category:', 'pstroot'), /* parent taxonomy title */
      'edit_item' => __('Edit Team Category', 'pstroot'), /* edit custom taxonomy title */
      'update_item' => __('Update Team Category', 'pstroot'), /* update title for taxonomy */
      'add_new_item' => __('Add New Team Category', 'pstroot'), /* add new title for taxonomy */
      'new_item_name' => __('New Team Category Name', 'pstroot') /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_ui' => true,
    'query_var' => true,
    // 'rewrite' => array('slug' => 'team_category'),
    'show_in_rest' => true,
    )
);

// Add project tags (these act like categories)
register_taxonomy(
    'team_tag',
    array('team'),
    array(
    'hierarchical' => false,
    'labels' => array(
      'name' => __('Team Tags', 'pstroot'),
      'singular_name' => __('Team Tag', 'pstroot'),
      'search_items' =>  __('Search Team Tags', 'pstroot'),
      'all_items' => __('All Team Tags', 'pstroot'),
      'parent_item' => __('Parent Team Tag', 'pstroot'),
      'parent_item_colon' => __('Parent Team Tag:', 'pstroot'),
      'edit_item' => __('Edit Team Tag', 'pstroot'),
      'update_item' => __('Update Team Tag', 'pstroot'),
      'add_new_item' => __('Add New Team Tag', 'pstroot'),
      'new_item_name' => __('New Team Tag Name', 'pstroot')
    ),
    'show_admin_column' => true,
    'show_ui' => true,
    'query_var' => true,
    )
);





