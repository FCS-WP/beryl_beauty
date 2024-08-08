<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Blog Post Widget .
 *
 */
class Mixlax_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'mixlaxblogpost';
	}

	public function get_title() {
		return __( 'Blog Post', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'blog_post_style',
			[
				'label' => __( 'Style', 'mixlax' ),
                'type' => Controls_Manager::SELECT,
                'options'   => [
                    '1'   => __( 'Style One', 'mixlax' ),
                    '2'   => __( 'Style Two', 'mixlax' ),
                    '3'   => __( 'Style Three', 'mixlax' ),
                    '4'   => __( 'Style Four', 'mixlax' ),
                ],
                'default'  => '1'
			]
        );

        $this->add_control(
			'blog_post_count',
			[
				'label' 		=> __( 'No of Post to show', 'mixlax' ),
                'type' 			=> Controls_Manager::TEXT,
                'default'  		=> __( '3', 'mixlax' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '6', 'mixlax' ),
			]
		);

		$this->add_control(
			'enable_excerpt',
			[
				'label' 		=> __( 'Enable Excerpt?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'mixlax' ),
				'label_off' 	=> __( 'Hide', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label' 		=> __( 'Excerpt Length', 'mixlax' ),
                'type' 			=> Controls_Manager::TEXT,
                'default'  		=> __( '16', 'mixlax' ),
				'condition' 	=> [ 'enable_excerpt' => 'yes' ],
			]
        );

        $this->add_control(
			'blog_post_order',
			[
				'label' 		=> __( 'Order', 'mixlax' ),
                'type' 			=> Controls_Manager::SELECT,
                'options'   	=> [
                    'ASC'   		=> __( 'ASC', 'mixlax' ),
                    'DESC'   		=> __( 'DESC', 'mixlax' ),
                ],
                'default'  		=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'mixlax' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'mixlax' ),
                    'author'    => __( 'Author', 'mixlax' ),
                    'title'    	=> __( 'Title', 'mixlax' ),
                    'date'    	=> __( 'Date', 'mixlax' ),
                    'rand'    	=> __( 'Random', 'mixlax' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'view_more_btn_text',
			[
				'label' 		=> __( 'Continue Reading Button Text', 'mixlax' ),
                'type' 			=> Controls_Manager::TEXT,
                'default'   	=> __('Read More','mixlax'),
                'label_block'   => true,
				'condition'		=> [ 'blog_post_style' => '2' ],
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'mixlax' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->mixlax_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'mixlax' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->mixlax_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'mixlax' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->mixlax_post_id(),
			]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'blog_post_slider_control',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_style',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 			=> 'background',
				'label' 		=> __( 'Background', 'mixlax' ),
				'types' 		=> [ 'classic', 'gradient', 'video' ],
				'selector' 		=> '{{WRAPPER}} .vs-blog-layout1 .blog-content,{{WRAPPER}} .vs-blog-layout2 .blog-content,{{WRAPPER}} .vs-blog-layout3 .blog-content',
				'condition'		=> [ 'blog_post_style'	=> [ '1', '2', '3' ] ],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'box_shadow',
				'label' 		=> __( 'Box Shadow', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .vs-blog-layout1 .blog-content,{{WRAPPER}} .vs-blog-layout2 .blog-content,{{WRAPPER}} .vs-blog-layout3 .blog-content',
				'condition'		=> [ 'blog_post_style'	=> [ '1', '2', '3' ] ],
			]
		);

		$this->add_control(
			'count_text_color',
			[
				'label' 		=> __( 'Count Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-layout3 .blog-number,{{WRAPPER}} .vs-blog-layout4 .blog-number' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'blog_post_style'	=> [ '3','4' ] ],
			]
        );

		$this->add_control(
			'count_text_bg_color',
			[
				'label' 		=> __( 'Count Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-layout3 .blog-number,{{WRAPPER}} .vs-blog-layout4 .blog-number' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'blog_post_style'	=> [ '3','4' ] ],
			]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label' 	=> __( 'Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label' 		=> __( 'Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-title a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'label' 	=> __( 'Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-blog .blog-content .blog-title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'post_desc_style_section',
			[
				'label' 		=> __( 'Excerpt', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [ 'enable_excerpt' => 'yes' ],
			]
        );

        $this->add_control(
			'post_desc_color',
			[
				'label' 		=> __( 'Excerpt Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_desc_typography',
				'label' 	=> __( 'Excerpt Typography', 'mixlax' ),
                'selector' 	=> '{{WRAPPER}} .vs-blog .blog-content .blog-text',
			]
        );

        $this->add_responsive_control(
			'post_desc_margin',
			[
				'label' 		=> __( 'Excerpt Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_desc_padding',
			[
				'label' 		=> __( 'Excerpt Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'label' 		=> __( 'Meta Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'meta_icon_color',
			[
				'label' 		=> __( 'Meta Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-content .blog-meta a i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-blog .blog-content .blog-meta a',
			]
		);
		$this->end_controls_section();
    }

    public function mixlax_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'mixlax');
        }

        return $catarr;
    }

    public function mixlax_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'mixlax');
        }

        return $catarr;
    }

    // Get Specific Post
    public function mixlax_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $mixlax_post = new WP_Query( $args );

        $postarray = [];

        while( $mixlax_post->have_posts() ){
            $mixlax_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


        $blogpost = new WP_Query( $args );
        if( $blogpost->have_posts() ) {
            if( $settings['blog_post_style'] == '1' ) {
				echo '<!-- blog Area -->';
				echo '<section class="vs-blog-wrapper vs-blog-layout1 link-inherit">';
				  	echo '<div class="container">';
				    	echo '<div class="row vs-carousel" data-slide-to-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
							while( $blogpost->have_posts() ) {
								$blogpost->the_post();
						      	echo '<!-- Single Blog -->';
						      	echo '<div class="col-lg-4">';
						        	echo '<div class="vs-blog blog-style4">';
										if( has_post_thumbnail() ) {
											echo '<!-- Blog Image -->';
											echo '<div class="blog-image image-scale-hover">';
												echo '<a href="'.esc_url( get_the_permalink() ).'">';
													the_post_thumbnail( 'blog-post-image-one',array( 'class' => 'w-100' ) );
												echo '</a>';
											echo '</div>';
										}
										echo '<div class="blog-content">';
				                            echo '<div class="blog-meta">';
				                                echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
				                                echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'.esc_html( get_the_author() ).'</a>';
				                            echo '</div>';
											if( get_the_title() ){
												$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 6;
							            		echo '<h3 class="blog-title h4"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h3>';
											}
											if( $settings['enable_excerpt'] == 'yes' ){
												$mixlax_excerpt_length = $settings['excerpt_count'] ? $settings['excerpt_count'] : 16;
												echo wellnez_paragraph_tag( array(
	                                                "text"  => wp_kses_post( wp_trim_words( get_the_excerpt(), $mixlax_excerpt_length, '' ) ),
													'class' => 'blog-text',
	                                            ) );
											}
				                        echo '</div>';
						        	echo '</div>';
						      	echo '</div>';
						  	}
							wp_reset_postdata();
				    	echo '</div><!-- .row END -->';
				  	echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- blog Area end -->';
            } elseif( $settings['blog_post_style'] == '2' ) {
                if( $blogpost->have_posts() ) {
					echo '<!-- blog Area -->';
					echo '<section class="vs-blog-wrapper vs-blog-layout2 link-inherit">';
					  	echo '<div class="container">';
							echo '<div class="row vs-carousel" data-slide-to-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
								while( $blogpost->have_posts() ) {
									$blogpost->the_post();
									echo '<div class="col-lg-4">';
					                    echo '<div class="vs-blog">';
											if( has_post_thumbnail() ) {
												echo '<!-- Blog Image -->';
												echo '<div class="blog-image image-scale-hover">';
													echo '<a href="'.esc_url( get_the_permalink() ).'">';
														the_post_thumbnail( 'blog-post-image-one',array( 'class' => 'w-100' ) );
													echo '</a>';
												echo '</div>';
											}
					                        echo '<div class="blog-content">';
												if( get_the_title() ){
													$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 6;
								            		echo '<h3 class="blog-title h4 mb-10"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h3>';
												}
												if( $settings['enable_excerpt'] == 'yes' ){
													$mixlax_excerpt_length = $settings['excerpt_count'] ? $settings['excerpt_count'] : 16;
													echo wellnez_paragraph_tag( array(
		                                                "text"  => wp_kses_post( wp_trim_words( get_the_excerpt(), $mixlax_excerpt_length, '' ) ),
														'class' => 'blog-text',
		                                            ) );
												}
												if( ! empty( $settings['view_more_btn_text'] ) ){
						                            echo '<a href="'.esc_url( get_the_permalink() ).'" class="link-btn text-theme">'.esc_html( $settings['view_more_btn_text'] ).'<i class="fal fa-long-arrow-right"></i></a>';
												}
					                            echo '<div class="blog-meta">';
													echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
												    echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'.esc_html__( 'By ', 'mixlax' ).''.esc_html( get_the_author() ).'</a>';
					                            echo '</div>';
					                        echo '</div>';
					                    echo '</div>';
					                echo '</div>';
				  				}
								wp_reset_postdata();
							echo '</div><!-- .row END -->';
						echo '</div><!-- .container END -->';
					echo '</section>';
					echo '<!-- blog Area end -->';
                }
            }elseif( $settings['blog_post_style'] == '3' ){
				if( $blogpost->have_posts() ) {
					$x = 1;
					echo '<!-- blog Area -->';
					echo '<section class="vs-blog-wrapper vs-blog-layout3 link-inherit">';
					  	echo '<div class="container">';
					    	echo '<div class="row vs-carousel" data-slide-to-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
								while( $blogpost->have_posts() ) {
									$blogpost->the_post();
									echo '<div class="col-lg-4">';
					                    echo '<div class="vs-blog">';
											if( $x > 10 ){
												$number = $x;
											}else{
												$number = '0'.$x;
											}
					                        echo '<span class="blog-number">'.esc_html( $number ).'</span>';
											if( has_post_thumbnail() ) {
												echo '<!-- Blog Image -->';
												echo '<div class="blog-image image-scale-hover">';
													echo '<a href="'.esc_url( get_the_permalink() ).'">';
														the_post_thumbnail( 'blog-post-image-three',array( 'class' => 'w-100' ) );
													echo '</a>';
												echo '</div>';
											}
					                        echo '<div class="blog-content">';
					                            echo '<div class="blog-meta">';
													echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
													echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'.esc_html__( 'By ', 'mixlax' ).''.esc_html( get_the_author() ).'</a>';
					                            echo '</div>';
												if( get_the_title() ){
													$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 6;
								            		echo '<h3 class="blog-title h4 mb-10"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h3>';
												}
												if( $settings['enable_excerpt'] == 'yes' ){
													$mixlax_excerpt_length = $settings['excerpt_count'] ? $settings['excerpt_count'] : 16;
													echo wellnez_paragraph_tag( array(
		                                                "text"  => wp_kses_post( wp_trim_words( get_the_excerpt(), $mixlax_excerpt_length, '' ) ),
														'class' => 'blog-text',
		                                            ) );
												}
					                        echo '</div>';
					                    echo '</div>';
					                echo '</div>';
									$x++;
								}
								wp_reset_postdata();
					    	echo '</div><!-- .row END -->';
					  	echo '</div><!-- .container END -->';
					echo '</section>';
					echo '<!-- blog Area end -->';
				}
			}else{
				if( $blogpost->have_posts() ) {
					$x = 1;
					echo '<section class="vs-blog-wrapper vs-blog-layout4 link-inherit">';
						echo '<div class="container">';
							echo '<div class="row vs-carousel" data-slide-to-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
								while( $blogpost->have_posts() ) {
									$blogpost->the_post();
									echo '<div class="col-xl-4">';
					                    echo '<div class="vs-blog blog-style3 image-scale-hover">';
											if( $x > 10 ){
												$number = $x;
											}else{
												$number = '0'.$x;
											}
					                        echo '<span class="blog-number">'.esc_html( $number ).'</span>';
					                        echo '<a href="'.esc_url( get_the_permalink() ).'" class="overlay"></a>';
											if( has_post_thumbnail() ) {
												echo '<!-- Blog Image -->';
												echo '<div class="blog-image image-scale-hover">';
													echo '<a href="'.esc_url( get_the_permalink() ).'">';
														the_post_thumbnail( 'blog-post-image-four',array( 'class' => 'w-100' ) );
													echo '</a>';
												echo '</div>';
											}
					                        echo '<div class="blog-content">';
					                            echo '<div class="blog-meta text-xs mb-10">';
													echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
													echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'.esc_html__( 'By ', 'mixlax' ).''.esc_html( get_the_author() ).'</a>';
					                            echo '</div>';
												if( get_the_title() ){
													$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 6;
								            		echo '<h3 class="blog-title h4 mb-10"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h3>';
												}
												if( $settings['enable_excerpt'] == 'yes' ){
													$mixlax_excerpt_length = $settings['excerpt_count'] ? $settings['excerpt_count'] : 16;
													echo wellnez_paragraph_tag( array(
		                                                "text"  => wp_kses_post( wp_trim_words( get_the_excerpt(), $mixlax_excerpt_length, '' ) ),
														'class' => 'blog-text',
		                                            ) );
												}
					                        echo '</div>';
					                    echo '</div>';
					                echo '</div>';
									$x++;
								}
								wp_reset_postdata();
							echo '</div>';
						echo '</div>';
					echo '</section>';
				}
			}
        }
	}
}