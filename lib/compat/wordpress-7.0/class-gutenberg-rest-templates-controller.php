<?php

class Gutenberg_REST_Templates_Controller_7_0 extends WP_REST_Posts_Controller {
	/**
	 * Prepare a single template output for response
	 *
	 * @since 5.8.0
	 * @since 5.9.0 Renamed `$template` to `$item` to match parent class for PHP 8 named parameter support.
	 * @since 6.3.0 Added `modified` property to the response.
	 *
	 * @param WP_Block_Template $item    Template instance.
	 * @param WP_REST_Request   $request Request object.
	 * @return WP_REST_Response Response object.
	 */
	// public function prepare_item_for_response( $item, $request ) {
	// 	// Don't prepare the response body for HEAD requests.
	// 	if ( $request->is_method( 'HEAD' ) ) {
	// 		return new WP_REST_Response( array() );
	// 	}

	// 	/*
	// 	 * Resolve pattern blocks so they don't need to be resolved client-side
	// 	 * in the editor, improving performance.
	// 	 */
	// 	$blocks        = parse_blocks( $item->content );
	// 	$blocks        = gutenberg_resolve_pattern_blocks( $blocks );
	// 	$item->content = serialize_blocks( $blocks );
    //     error_log( 'Gutenberg_WP_REST_Templates_Controller_7_0>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>' );

	// 	// Restores the more descriptive, specific name for use within this method.
	// 	$template = $item;

	// 	$fields = $this->get_fields_for_response( $request );

	// 	// Base fields for every template.
	// 	$data = array();

	// 	if ( rest_is_field_included( 'id', $fields ) ) {
	// 		$data['id'] = $template->id;
	// 	}

	// 	if ( rest_is_field_included( 'theme', $fields ) ) {
	// 		$data['theme'] = $template->theme;
	// 	}

	// 	if ( rest_is_field_included( 'content', $fields ) ) {
	// 		$data['content'] = array();
	// 	}
	// 	if ( rest_is_field_included( 'content.raw', $fields ) ) {
	// 		$data['content']['raw'] = $template->content;
	// 	}

	// 	if ( rest_is_field_included( 'content.block_version', $fields ) ) {
	// 		$data['content']['block_version'] = block_version( $template->content );
	// 	}

	// 	if ( rest_is_field_included( 'slug', $fields ) ) {
	// 		$data['slug'] = $template->slug;
	// 	}

	// 	if ( rest_is_field_included( 'source', $fields ) ) {
	// 		$data['source'] = $template->source;
	// 	}

	// 	if ( rest_is_field_included( 'origin', $fields ) ) {
	// 		$data['origin'] = $template->origin;
	// 	}

	// 	if ( rest_is_field_included( 'type', $fields ) ) {
	// 		$data['type'] = $template->type;
	// 	}

	// 	if ( rest_is_field_included( 'description', $fields ) ) {
	// 		$data['description'] = $template->description;
	// 	}

	// 	if ( rest_is_field_included( 'title', $fields ) ) {
	// 		$data['title'] = array();
	// 	}

	// 	if ( rest_is_field_included( 'title.raw', $fields ) ) {
	// 		$data['title']['raw'] = $template->title;
	// 	}

	// 	if ( rest_is_field_included( 'title.rendered', $fields ) ) {
	// 		if ( $template->wp_id ) {
	// 			/** This filter is documented in wp-includes/post-template.php */
	// 			$data['title']['rendered'] = apply_filters( 'the_title', $template->title, $template->wp_id );
	// 		} else {
	// 			$data['title']['rendered'] = $template->title;
	// 		}
	// 	}

	// 	if ( rest_is_field_included( 'status', $fields ) ) {
	// 		$data['status'] = $template->status;
	// 	}

	// 	if ( rest_is_field_included( 'wp_id', $fields ) ) {
	// 		$data['wp_id'] = (int) $template->wp_id;
	// 	}

	// 	if ( rest_is_field_included( 'has_theme_file', $fields ) ) {
	// 		$data['has_theme_file'] = (bool) $template->has_theme_file;
	// 	}

	// 	if ( rest_is_field_included( 'is_custom', $fields ) && 'wp_template' === $template->type ) {
	// 		$data['is_custom'] = $template->is_custom;
	// 	}

	// 	if ( rest_is_field_included( 'author', $fields ) ) {
	// 		$data['author'] = (int) $template->author;
	// 	}

	// 	if ( rest_is_field_included( 'area', $fields ) && 'wp_template_part' === $template->type ) {
	// 		$data['area'] = $template->area;
	// 	}

	// 	if ( rest_is_field_included( 'modified', $fields ) ) {
	// 		$data['modified'] = mysql_to_rfc3339( $template->modified );
	// 	}

	// 	if ( rest_is_field_included( 'author_text', $fields ) ) {
	// 		$data['author_text'] = self::get_wp_templates_author_text_field( $template );
	// 	}

	// 	if ( rest_is_field_included( 'original_source', $fields ) ) {
	// 		$data['original_source'] = self::get_wp_templates_original_source_field( $template );
	// 	}

	// 	if ( rest_is_field_included( 'plugin', $fields ) ) {
	// 		$registered_template = WP_Block_Templates_Registry::get_instance()->get_by_slug( $template->slug );
	// 		if ( $registered_template ) {
	// 			$data['plugin'] = $registered_template->plugin;
	// 		}
	// 	}

	// 	$context = ! empty( $request['context'] ) ? $request['context'] : 'view';
	// 	$data    = $this->add_additional_fields_to_object( $data, $request );
	// 	$data    = $this->filter_response_by_context( $data, $context );

	// 	// Wrap the data in a response object.
	// 	$response = rest_ensure_response( $data );

	// 	if ( rest_is_field_included( '_links', $fields ) || rest_is_field_included( '_embedded', $fields ) ) {
	// 		$links = $this->prepare_links( $template->id );
	// 		$response->add_links( $links );
	// 		if ( ! empty( $links['self']['href'] ) ) {
	// 			$actions = $this->get_available_actions();
	// 			$self    = $links['self']['href'];
	// 			foreach ( $actions as $rel ) {
	// 				$response->add_link( $rel, $self );
	// 			}
	// 		}
	// 	}

	// 	return $response;
	// }

	/**
	 * Retrieves a collection of posts.
	 *
	 * @since 4.7.0
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
	 */
	public function get_items( $request ) {

		// Ensure a search string is set in case the orderby is set to 'relevance'.
		if ( ! empty( $request['orderby'] ) && 'relevance' === $request['orderby'] && empty( $request['search'] ) ) {
			return new WP_Error(
				'rest_no_search_term_defined',
				__( 'You need to define a search term to order by relevance.' ),
				array( 'status' => 400 )
			);
		}

		// Ensure an include parameter is set in case the orderby is set to 'include'.
		if ( ! empty( $request['orderby'] ) && 'include' === $request['orderby'] && empty( $request['include'] ) ) {
			return new WP_Error(
				'rest_orderby_include_missing_include',
				__( 'You need to define an include parameter to order by include.' ),
				array( 'status' => 400 )
			);
		}

		// Retrieve the list of registered collection query parameters.
		$registered = $this->get_collection_params();
		$args       = array();

		/*
		 * This array defines mappings between public API query parameters whose
		 * values are accepted as-passed, and their internal WP_Query parameter
		 * name equivalents (some are the same). Only values which are also
		 * present in $registered will be set.
		 */
		$parameter_mappings = array(
			'author'         => 'author__in',
			'author_exclude' => 'author__not_in',
			'exclude'        => 'post__not_in',
			'include'        => 'post__in',
			'ignore_sticky'  => 'ignore_sticky_posts',
			'menu_order'     => 'menu_order',
			'offset'         => 'offset',
			'order'          => 'order',
			'orderby'        => 'orderby',
			'page'           => 'paged',
			'parent'         => 'post_parent__in',
			'parent_exclude' => 'post_parent__not_in',
			'search'         => 's',
			'search_columns' => 'search_columns',
			'slug'           => 'post_name__in',
			'status'         => 'post_status',
		);

		/*
		 * For each known parameter which is both registered and present in the request,
		 * set the parameter's value on the query $args.
		 */
		foreach ( $parameter_mappings as $api_param => $wp_param ) {
			if ( isset( $registered[ $api_param ], $request[ $api_param ] ) ) {
				$args[ $wp_param ] = $request[ $api_param ];
			}
		}

		// Check for & assign any parameters which require special handling or setting.
		$args['date_query'] = array();

		if ( isset( $registered['before'], $request['before'] ) ) {
			$args['date_query'][] = array(
				'before' => $request['before'],
				'column' => 'post_date',
			);
		}

		if ( isset( $registered['modified_before'], $request['modified_before'] ) ) {
			$args['date_query'][] = array(
				'before' => $request['modified_before'],
				'column' => 'post_modified',
			);
		}

		if ( isset( $registered['after'], $request['after'] ) ) {
			$args['date_query'][] = array(
				'after'  => $request['after'],
				'column' => 'post_date',
			);
		}

		if ( isset( $registered['modified_after'], $request['modified_after'] ) ) {
			$args['date_query'][] = array(
				'after'  => $request['modified_after'],
				'column' => 'post_modified',
			);
		}

		// Ensure our per_page parameter overrides any provided posts_per_page filter.
		if ( isset( $registered['per_page'] ) ) {
			$args['posts_per_page'] = $request['per_page'];
		}

		if ( isset( $registered['sticky'], $request['sticky'] ) ) {
			$sticky_posts = get_option( 'sticky_posts', array() );
			if ( ! is_array( $sticky_posts ) ) {
				$sticky_posts = array();
			}
			if ( $request['sticky'] ) {
				/*
				 * As post__in will be used to only get sticky posts,
				 * we have to support the case where post__in was already
				 * specified.
				 */
				$args['post__in'] = $args['post__in'] ? array_intersect( $sticky_posts, $args['post__in'] ) : $sticky_posts;

				/*
				 * If we intersected, but there are no post IDs in common,
				 * WP_Query won't return "no posts" for post__in = array()
				 * so we have to fake it a bit.
				 */
				if ( ! $args['post__in'] ) {
					$args['post__in'] = array( 0 );
				}
			} elseif ( $sticky_posts ) {
				/*
				 * As post___not_in will be used to only get posts that
				 * are not sticky, we have to support the case where post__not_in
				 * was already specified.
				 */
				$args['post__not_in'] = array_merge( $args['post__not_in'], $sticky_posts );
			}
		}

		/*
		 * Honor the original REST API `post__in` behavior. Don't prepend sticky posts
		 * when `post__in` has been specified.
		 */
		if ( ! empty( $args['post__in'] ) ) {
			unset( $args['ignore_sticky_posts'] );
		}

		if (
			isset( $registered['search_semantics'], $request['search_semantics'] )
			&& 'exact' === $request['search_semantics']
		) {
			$args['exact'] = true;
		}

		$args = $this->prepare_tax_query( $args, $request );

		if ( isset( $registered['format'], $request['format'] ) ) {
			$formats = $request['format'];
			/*
			 * The relation needs to be set to `OR` since the request can contain
			 * two separate conditions. The user may be querying for items that have
			 * either the `standard` format or a specific format.
			 */
			$formats_query = array( 'relation' => 'OR' );

			/*
			 * The default post format, `standard`, is not stored in the database.
			 * If `standard` is part of the request, the query needs to exclude all post items that
			 * have a format assigned.
			 */
			if ( in_array( 'standard', $formats, true ) ) {
				$formats_query[] = array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'operator' => 'NOT EXISTS',
				);
				// Remove the `standard` format, since it cannot be queried.
				unset( $formats[ array_search( 'standard', $formats, true ) ] );
			}

			// Add any remaining formats to the formats query.
			if ( ! empty( $formats ) ) {
				// Add the `post-format-` prefix.
				$terms = array_map(
					static function ( $format ) {
						return "post-format-$format";
					},
					$formats
				);

				$formats_query[] = array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => $terms,
					'operator' => 'IN',
				);
			}

			// Enable filtering by both post formats and other taxonomies by combining them with `AND`.
			if ( isset( $args['tax_query'] ) ) {
				$args['tax_query'][] = array(
					'relation' => 'AND',
					$formats_query,
				);
			} else {
				$args['tax_query'] = $formats_query;
			}
		}

		// Force the post_type argument, since it's not a user input variable.
		$args['post_type'] = $this->post_type;

		$is_head_request = $request->is_method( 'HEAD' );
		if ( $is_head_request ) {
			// Force the 'fields' argument. For HEAD requests, only post IDs are required to calculate pagination.
			$args['fields'] = 'ids';
			// Disable priming post meta for HEAD requests to improve performance.
			$args['update_post_term_cache'] = false;
			$args['update_post_meta_cache'] = false;
		}

		/**
		 * Filters WP_Query arguments when querying posts via the REST API.
		 *
		 * The dynamic portion of the hook name, `$this->post_type`, refers to the post type slug.
		 *
		 * Possible hook names include:
		 *
		 *  - `rest_post_query`
		 *  - `rest_page_query`
		 *  - `rest_attachment_query`
		 *
		 * Enables adding extra arguments or setting defaults for a post collection request.
		 *
		 * @since 4.7.0
		 * @since 5.7.0 Moved after the `tax_query` query arg is generated.
		 *
		 * @link https://developer.wordpress.org/reference/classes/wp_query/
		 *
		 * @param array           $args    Array of arguments for WP_Query.
		 * @param WP_REST_Request $request The REST API request.
		 */
		$args       = apply_filters( "rest_{$this->post_type}_query", $args, $request );
		$query_args = $this->prepare_items_query( $args, $request );

		$posts_query  = new WP_Query();
		$query_result = $posts_query->query( $query_args );

		// Allow access to all password protected posts if the context is edit.
		if ( 'edit' === $request['context'] ) {
			add_filter( 'post_password_required', array( $this, 'check_password_required' ), 10, 2 );
		}

		if ( ! $is_head_request ) {
			$posts = array();

			update_post_author_caches( $query_result );
			update_post_parent_caches( $query_result );

			if ( post_type_supports( $this->post_type, 'thumbnail' ) ) {
				update_post_thumbnail_cache( $posts_query );
			}

			foreach ( $query_result as $post ) {
				if ( 'edit' === $request['context'] ) {
					$permission = $this->check_update_permission( $post );
				} else {
					$permission = $this->check_read_permission( $post );
				}

				if ( ! $permission ) {
					continue;
				}

				$data    = $this->prepare_item_for_response( $post, $request );
				$posts[] = $this->prepare_response_for_collection( $data );
			}
		}

		// Reset filter.
		if ( 'edit' === $request['context'] ) {
			remove_filter( 'post_password_required', array( $this, 'check_password_required' ) );
		}

		$page        = isset( $query_args['paged'] ) ? (int) $query_args['paged'] : 0;
		$total_posts = $posts_query->found_posts;

		if ( $total_posts < 1 && $page > 1 ) {
			// Out-of-bounds, run the query without pagination/offset to get the total count.
			unset( $query_args['paged'] );

			$count_query                          = new WP_Query();
			$query_args['fields']                 = 'ids';
			$query_args['posts_per_page']         = 1;
			$query_args['update_post_meta_cache'] = false;
			$query_args['update_post_term_cache'] = false;

			$count_query->query( $query_args );
			$total_posts = $count_query->found_posts;
		}

		$max_pages = (int) ceil( $total_posts / (int) $posts_query->query_vars['posts_per_page'] );

		if ( $page > $max_pages && $total_posts > 0 ) {
			return new WP_Error(
				'rest_post_invalid_page_number',
				__( 'The page number requested is larger than the number of pages available.' ),
				array( 'status' => 400 )
			);
		}

		$response = $is_head_request ? new WP_REST_Response( array() ) : rest_ensure_response( $posts );

		$response->header( 'X-WP-Total', (int) $total_posts );
		$response->header( 'X-WP-TotalPages', (int) $max_pages );

		$request_params = $request->get_query_params();
		$collection_url = rest_url( rest_get_route_for_post_type_items( $this->post_type ) );
		$base           = add_query_arg( urlencode_deep( $request_params ), $collection_url );

		if ( $page > 1 ) {
			$prev_page = $page - 1;

			if ( $prev_page > $max_pages ) {
				$prev_page = $max_pages;
			}

			$prev_link = add_query_arg( 'page', $prev_page, $base );
			$response->link_header( 'prev', $prev_link );
		}
		if ( $max_pages > $page ) {
			$next_page = $page + 1;
			$next_link = add_query_arg( 'page', $next_page, $base );

			$response->link_header( 'next', $next_link );
		}

		return $response;
	}


	/**
	 * Prepares a single post output for response.
	 *
	 * @since 4.7.0
	 * @since 5.9.0 Renamed `$post` to `$item` to match parent class for PHP 8 named parameter support.
	 *
	 * @global WP_Post $post Global post object.
	 *
	 * @param WP_Post         $item    Post object.
	 * @param WP_REST_Request $request Request object.
	 * @return WP_REST_Response Response object.
	 */
	public function prepare_item_for_response( $item, $request ) {
		// Restores the more descriptive, specific name for use within this method.
		$post = $item;

		$GLOBALS['post'] = $post;

		setup_postdata( $post );

		// Don't prepare the response body for HEAD requests.
		if ( $request->is_method( 'HEAD' ) ) {
			/** This filter is documented in wp-includes/rest-api/endpoints/class-wp-rest-posts-controller.php */
			return apply_filters( "rest_prepare_{$this->post_type}", new WP_REST_Response( array() ), $post, $request );
		}

		$fields = $this->get_fields_for_response( $request );

		// Base fields for every post.
		$data = array();

		if ( rest_is_field_included( 'id', $fields ) ) {
			$data['id'] = $post->ID;
		}

		if ( rest_is_field_included( 'date', $fields ) ) {
			$data['date'] = $this->prepare_date_response( $post->post_date_gmt, $post->post_date );
		}

		if ( rest_is_field_included( 'date_gmt', $fields ) ) {
			/*
			 * For drafts, `post_date_gmt` may not be set, indicating that the date
			 * of the draft should be updated each time it is saved (see #38883).
			 * In this case, shim the value based on the `post_date` field
			 * with the site's timezone offset applied.
			 */
			if ( '0000-00-00 00:00:00' === $post->post_date_gmt ) {
				$post_date_gmt = get_gmt_from_date( $post->post_date );
			} else {
				$post_date_gmt = $post->post_date_gmt;
			}
			$data['date_gmt'] = $this->prepare_date_response( $post_date_gmt );
		}

		if ( rest_is_field_included( 'guid', $fields ) ) {
			$data['guid'] = array(
				/** This filter is documented in wp-includes/post-template.php */
				'rendered' => apply_filters( 'get_the_guid', $post->guid, $post->ID ),
				'raw'      => $post->guid,
			);
		}

		if ( rest_is_field_included( 'modified', $fields ) ) {
			$data['modified'] = $this->prepare_date_response( $post->post_modified_gmt, $post->post_modified );
		}

		if ( rest_is_field_included( 'modified_gmt', $fields ) ) {
			/*
			 * For drafts, `post_modified_gmt` may not be set (see `post_date_gmt` comments
			 * above). In this case, shim the value based on the `post_modified` field
			 * with the site's timezone offset applied.
			 */
			if ( '0000-00-00 00:00:00' === $post->post_modified_gmt ) {
				$post_modified_gmt = gmdate( 'Y-m-d H:i:s', strtotime( $post->post_modified ) - (int) ( (float) get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) );
			} else {
				$post_modified_gmt = $post->post_modified_gmt;
			}
			$data['modified_gmt'] = $this->prepare_date_response( $post_modified_gmt );
		}

		if ( rest_is_field_included( 'password', $fields ) ) {
			$data['password'] = $post->post_password;
		}

		if ( rest_is_field_included( 'slug', $fields ) ) {
			$data['slug'] = $post->post_name;
		}

		if ( rest_is_field_included( 'status', $fields ) ) {
			$data['status'] = $post->post_status;
		}

		if ( rest_is_field_included( 'type', $fields ) ) {
			$data['type'] = $post->post_type;
		}

		if ( rest_is_field_included( 'link', $fields ) ) {
			$data['link'] = get_permalink( $post->ID );
		}

		if ( rest_is_field_included( 'title', $fields ) ) {
			$data['title'] = array();
		}
		if ( rest_is_field_included( 'title.raw', $fields ) ) {
			$data['title']['raw'] = $post->post_title;
		}
		if ( rest_is_field_included( 'title.rendered', $fields ) ) {
			add_filter( 'protected_title_format', array( $this, 'protected_title_format' ) );
			add_filter( 'private_title_format', array( $this, 'protected_title_format' ) );

			$data['title']['rendered'] = get_the_title( $post->ID );

			remove_filter( 'protected_title_format', array( $this, 'protected_title_format' ) );
			remove_filter( 'private_title_format', array( $this, 'protected_title_format' ) );
		}

		$has_password_filter = false;

		if ( $this->can_access_password_content( $post, $request ) ) {
			$this->password_check_passed[ $post->ID ] = true;
			// Allow access to the post, permissions already checked before.
			add_filter( 'post_password_required', array( $this, 'check_password_required' ), 10, 2 );

			$has_password_filter = true;
		}

		if ( rest_is_field_included( 'content', $fields ) ) {
			$data['content'] = array();
		}
		if ( rest_is_field_included( 'content.raw', $fields ) ) {
            /*
            * Resolve pattern blocks so they don't need to be resolved client-side
            * in the editor, improving performance.
            */
            $blocks        = parse_blocks( $post->post_content );
            $blocks        = gutenberg_resolve_pattern_blocks( $blocks );

			$data['content']['raw'] = serialize_blocks( $blocks );
		}
		if ( rest_is_field_included( 'content.rendered', $fields ) ) {
			/** This filter is documented in wp-includes/post-template.php */
			$data['content']['rendered'] = post_password_required( $post ) ? '' : apply_filters( 'the_content', $post->post_content );
		}
		if ( rest_is_field_included( 'content.protected', $fields ) ) {
			$data['content']['protected'] = (bool) $post->post_password;
		}
		if ( rest_is_field_included( 'content.block_version', $fields ) ) {
			$data['content']['block_version'] = block_version( $post->post_content );
		}

		if ( rest_is_field_included( 'excerpt', $fields ) ) {
			if ( isset( $request['excerpt_length'] ) ) {
				$excerpt_length          = $request['excerpt_length'];
				$override_excerpt_length = static function () use ( $excerpt_length ) {
					return $excerpt_length;
				};

				add_filter(
					'excerpt_length',
					$override_excerpt_length,
					20
				);
			}

			/** This filter is documented in wp-includes/post-template.php */
			$excerpt = apply_filters( 'get_the_excerpt', $post->post_excerpt, $post );

			/** This filter is documented in wp-includes/post-template.php */
			$excerpt = apply_filters( 'the_excerpt', $excerpt );

			$data['excerpt'] = array(
				'raw'       => $post->post_excerpt,
				'rendered'  => post_password_required( $post ) ? '' : $excerpt,
				'protected' => (bool) $post->post_password,
			);

			if ( isset( $override_excerpt_length ) ) {
				remove_filter(
					'excerpt_length',
					$override_excerpt_length,
					20
				);
			}
		}

		if ( $has_password_filter ) {
			// Reset filter.
			remove_filter( 'post_password_required', array( $this, 'check_password_required' ) );
		}

		if ( rest_is_field_included( 'author', $fields ) ) {
			$data['author'] = (int) $post->post_author;
		}

		if ( rest_is_field_included( 'featured_media', $fields ) ) {
			$data['featured_media'] = (int) get_post_thumbnail_id( $post->ID );
		}

		if ( rest_is_field_included( 'parent', $fields ) ) {
			$data['parent'] = (int) $post->post_parent;
		}

		if ( rest_is_field_included( 'menu_order', $fields ) ) {
			$data['menu_order'] = (int) $post->menu_order;
		}

		if ( rest_is_field_included( 'comment_status', $fields ) ) {
			$data['comment_status'] = $post->comment_status;
		}

		if ( rest_is_field_included( 'ping_status', $fields ) ) {
			$data['ping_status'] = $post->ping_status;
		}

		if ( rest_is_field_included( 'sticky', $fields ) ) {
			$data['sticky'] = is_sticky( $post->ID );
		}

		if ( rest_is_field_included( 'template', $fields ) ) {
			$template = get_page_template_slug( $post->ID );
			if ( $template ) {
				$data['template'] = $template;
			} else {
				$data['template'] = '';
			}
		}

		if ( rest_is_field_included( 'format', $fields ) ) {
			$data['format'] = get_post_format( $post->ID );

			// Fill in blank post format.
			if ( empty( $data['format'] ) ) {
				$data['format'] = 'standard';
			}
		}

		if ( rest_is_field_included( 'meta', $fields ) ) {
			$data['meta'] = $this->meta->get_value( $post->ID, $request );
		}

		$taxonomies = wp_list_filter( get_object_taxonomies( $this->post_type, 'objects' ), array( 'show_in_rest' => true ) );

		foreach ( $taxonomies as $taxonomy ) {
			$base = ! empty( $taxonomy->rest_base ) ? $taxonomy->rest_base : $taxonomy->name;

			if ( rest_is_field_included( $base, $fields ) ) {
				$terms         = get_the_terms( $post, $taxonomy->name );
				$data[ $base ] = $terms ? array_values( wp_list_pluck( $terms, 'term_id' ) ) : array();
			}
		}

		$post_type_obj = get_post_type_object( $post->post_type );
		if ( is_post_type_viewable( $post_type_obj ) && $post_type_obj->public ) {
			$permalink_template_requested = rest_is_field_included( 'permalink_template', $fields );
			$generated_slug_requested     = rest_is_field_included( 'generated_slug', $fields );

			if ( $permalink_template_requested || $generated_slug_requested ) {
				if ( ! function_exists( 'get_sample_permalink' ) ) {
					require_once ABSPATH . 'wp-admin/includes/post.php';
				}

				$sample_permalink = get_sample_permalink( $post->ID, $post->post_title, '' );

				if ( $permalink_template_requested ) {
					$data['permalink_template'] = $sample_permalink[0];
				}

				if ( $generated_slug_requested ) {
					$data['generated_slug'] = $sample_permalink[1];
				}
			}

			if ( rest_is_field_included( 'class_list', $fields ) ) {
				$data['class_list'] = get_post_class( array(), $post->ID );
			}
		}

		$context = ! empty( $request['context'] ) ? $request['context'] : 'view';
		$data    = $this->add_additional_fields_to_object( $data, $request );
		$data    = $this->filter_response_by_context( $data, $context );

		// Wrap the data in a response object.
		$response = rest_ensure_response( $data );

		if ( rest_is_field_included( '_links', $fields ) || rest_is_field_included( '_embedded', $fields ) ) {
			$links = $this->prepare_links( $post );
			$response->add_links( $links );

			if ( ! empty( $links['self']['href'] ) ) {
				$actions = $this->get_available_actions( $post, $request );

				$self = $links['self']['href'];

				foreach ( $actions as $rel ) {
					$response->add_link( $rel, $self );
				}
			}
		}

		/**
		 * Filters the post data for a REST API response.
		 *
		 * The dynamic portion of the hook name, `$this->post_type`, refers to the post type slug.
		 *
		 * Possible hook names include:
		 *
		 *  - `rest_prepare_post`
		 *  - `rest_prepare_page`
		 *  - `rest_prepare_attachment`
		 *
		 * @since 4.7.0
		 *
		 * @param WP_REST_Response $response The response object.
		 * @param WP_Post          $post     Post object.
		 * @param WP_REST_Request  $request  Request object.
		 */
		return apply_filters( "rest_prepare_{$this->post_type}", $response, $post, $request );
	}


}