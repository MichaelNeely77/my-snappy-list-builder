<?php

function slb_register_slb_list() {

	/**
	 * Post Type: Lists.
	 */

	$labels = array(
		"name" => __( "Lists", "twentynineteen" ),
		"singular_name" => __( "List", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Lists", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slb_list", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title" ),
	);

	register_post_type( "slb_list", $args );
}

add_action( 'init', 'slb_register_slb_list' );


if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5d1d689da1563',
		'title' => 'List Settings',
		'fields' => array(
			array(
				'key' => 'field_5d1d68aa19943',
				'label' => 'Enable Reward on Opt-In',
				'name' => 'slb_enable_reward',
				'type' => 'radio',
				'instructions' => 'Whether or not you would like to reward subscribers when they sign-up to your list.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					0 => 'No',
					1 => 'Yes',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => 0,
				'layout' => 'vertical',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5d1d693719944',
				'label' => 'Reward Title',
				'name' => 'slb_reward_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d1d68aa19943',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5d1d697a19945',
				'label' => 'Reward File',
				'name' => 'slb_reward_file',
				'type' => 'file',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d1d68aa19943',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slb_list',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'discussion',
			4 => 'comments',
			5 => 'revisions',
			6 => 'slug',
			7 => 'author',
			8 => 'format',
			9 => 'page_attributes',
			10 => 'featured_image',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
	
	endif;