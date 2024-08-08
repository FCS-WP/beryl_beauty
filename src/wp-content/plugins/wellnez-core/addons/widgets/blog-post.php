<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Wellnez_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'wellnezblogpost';
	}

	public function get_title() {
		return __( 'Blog Post', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'wellnez' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_post_style',
			[
				'label' 	=> __( 'Blog Style', 'wellnez' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'wellnez' ),
                    '2'   		=> __( 'Style Two', 'wellnez' ),
                    '3'   		=> __( 'Style Three', 'wellnez' ),
                    '4'   		=> __( 'Style Four', 'wellnez' ),
                    '5'   		=> __( 'Style Five', 'wellnez' ),
                    '6'   		=> __( 'Style Six', 'wellnez' ),
                    '7'   		=> __( 'Style Seven', 'wellnez' ),
                ],
                'default'  	=> '1'
			]
        );

        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '4', 'wellnez' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '10', 'wellnez' ),
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label' 	=> __( 'Excerpt Length', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '15', 'wellnez' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'wellnez' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','wellnez'),
                    'DESC'   	=> __('DESC','wellnez'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'wellnez' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'wellnez' ),
                    'author'    => __( 'Author', 'wellnez' ),
                    'title'    	=> __( 'Title', 'wellnez' ),
                    'date'    	=> __( 'Date', 'wellnez' ),
                    'rand'    	=> __( 'Random', 'wellnez' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'wellnez' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->wellnez_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'wellnez' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->wellnez_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'wellnez' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->wellnez_post_id(),
			]
        );

		$this->add_control(
			'read_more_text',
			[
				'label' 	=> __( 'Read More Text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( 'Read More', 'wellnez' ),
			]
		);

		$this->add_control(
			'btn_class',
			[
				'label' 	=> __( 'Button Class', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( 'link-btn', 'wellnez' ),
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'slide_arrow',
			[
				'label'     => esc_html__( 'Arrow?', 'wellnez' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wellnez' ),
				'label_off' => esc_html__( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 3,
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label' 	=> __( 'Title', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label' 		=> __( 'Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-title a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_color_hover',
			[
				'label' 		=> __( 'Title Color Hover', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'label' 	=> __( 'Title Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .vs-blog .blog-title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-grid .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-grid .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'label' 		=> __( 'Meta Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .vs-blog .blog-meta a',
			]
		);


		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .link-btn,{{WRAPPER}} .vs-btn.style3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .link-btn,{{WRAPPER}} .vs-btn.style3',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'number_style',
			[
				'label' 	=> __( 'Number', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition'		=> [ 'blog_post_style' => '7' ],
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' 		=> __( 'Number Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-style3 .blog-number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'number_bg_color',
			[
				'label' 		=> __( 'Background Number Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-style3 .blog-number' => 'backhround-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
    }

    public function wellnez_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'wellnez');
        }

        return $catarr;
    }

    public function wellnez_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'wellnez');
        }

        return $catarr;
    }

    // Get Specific Post
    public function wellnez_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $wellnez_post = new WP_Query( $args );

        $postarray = [];

        while( $wellnez_post->have_posts() ){
            $wellnez_post->the_post();
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

        $this->add_render_attribute( 'wrapper', 'class', 'row blog-carousel' );

        if($settings[ 'slide_arrow' ] == 'yes'){
            $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'true' );
        }else{
            $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
        }
      
        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		
		if( $settings['blog_post_style'] == '5' ){
			$this->add_render_attribute( 'wrapper', 'class', 'blog-style4-slider gx-30' );
		}

        $counter = 1;

        $blogpost = new WP_Query( $args );

        if( $blogpost->have_posts() ) {
			echo '<!-- blog Area -->';
			echo '<section class="vs-blog-wrapper arrow-wrap">';
			  	echo '<div class="container-xxl">';
			    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						while( $blogpost->have_posts() ) {
							$blogpost->the_post();
							if( $settings['blog_post_style'] == '1' || $settings['blog_post_style'] == '2' ){
								if( $settings['blog_post_style'] == '1' ){
									$style_class = "blog-style1";
								}else{
									$style_class = "blog-style2";
								}
								echo '<div class="col-md-6">';
									echo '<div class="vs-blog '.esc_html( $style_class ).'">';
				                        echo '<div class="blog-img">';
											if( has_post_thumbnail() ){
												echo '<a href="'.esc_url( get_permalink() ).'">';
													the_post_thumbnail( 'home-slider-blog-image', array( 'class' => 'w-100' ) );
												echo '</a>';
											}
										echo '</div>';
										echo '<div class="blog-content">';
											
											echo '<h3 class="blog-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
											if( ! empty( $settings['excerpt_count'] ) ){
												echo '<p class="blog-text">'.wp_kses_post( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
											}
											echo '<div class="blog-meta">';
												echo wellnez_anchor_tag( array(
													"text"  => wp_kses_post( 'BY '.ucwords( get_the_author() ) ),
													"url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) )
												) );
												echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
													echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
												echo '</a>';
											echo '</div>';
										echo '</div>';
				                        
				                    echo '</div>';
				                echo '</div>';
							}elseif( $settings['blog_post_style'] == '3' ){
								echo '<div class="col-md-6 col-lg-4 vs-blog blog-style3">';
				                    echo '<div class="blog-body">';
										if( has_post_thumbnail() ){
											echo '<div class="blog-img">';
												echo '<a href="'.esc_url( get_permalink() ).'">';
													the_post_thumbnail( 'home-slider-blog-image-three', array( 'class' => 'w-100' ) );
												echo '</a>';
											echo '</div>';
										}
				                        echo '<div class="blog-content">';
				                            echo '<div class="blog-meta">';
												echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="far fa-calendar"></i>';
													echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
												echo '</a>';
												echo wellnez_anchor_tag( array(
													"text"  => wp_kses_post( '<i class="fal fa-user"></i>'.ucwords( get_the_author() ) ),
													"url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) )
												) );
				                            echo '</div>';
											echo '<h3 class="blog-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
											if( ! empty( $settings['excerpt_count'] ) ){
												echo '<p class="blog-text">'.wp_kses_post( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
											}
				                            echo '<a href="'.esc_url( get_permalink() ).'" class="'.esc_attr( $settings['btn_class'] ).'">'.esc_html( $settings['read_more_text'] ).'<i class="far fa-arrow-right"></i></a>';
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}elseif( $settings['blog_post_style'] == '4' ){
								echo '<div class="col-md-6 col-lg-4 ">';
		                            echo '<div class="vs-blog blog-style4">';
										if( has_post_thumbnail() ){
											echo '<div class="blog-img">';
												echo '<a href="'.esc_url( get_permalink() ).'">';
													the_post_thumbnail( 'home-slider-blog-image-four', array( 'class' => 'w-100' ) );
												echo '</a>';
											echo '</div>';
										}
										
		                                echo '<div class="blog-content">';
		                                    echo '<div class="blog-meta">';
												echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="far fa-calendar"></i>';
													echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
												echo '</a>';
												echo wellnez_anchor_tag( array(
													"text"  => wp_kses_post( '<i class="fal fa-user"></i>'.ucwords( get_the_author() ) ),
													"url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) )
												) );
		                                    echo '</div>';
											echo '<h3 class="blog-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
				                            echo '<a href="'.esc_url( get_permalink() ).'" class="'.esc_attr( $settings['btn_class'] ).'">'.esc_html( $settings['read_more_text'] ).'<i class="far fa-arrow-right"></i></a>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
							}elseif( $settings['blog_post_style'] == '5' ){
								echo '<div class="col-md-6 col-lg-4 ">';
		                            echo '<div class="vs-blog blog-style4">';
										if( has_post_thumbnail() ){
											echo '<div class="blog-img">';
												echo '<a href="'.esc_url( get_permalink() ).'">';
													the_post_thumbnail( 'home-slider-blog-image-four', array( 'class' => 'w-100' ) );
												echo '</a>';
											echo '</div>';
										}
										
		                                echo '<div class="blog-content">';
		                                    echo '<div class="blog-meta">';
												echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'"><i class="far fa-calendar"></i>';
													echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
												echo '</a>';
												echo wellnez_anchor_tag( array(
													"text"  => wp_kses_post( '<i class="fal fa-user"></i>'.ucwords( get_the_author() ) ),
													"url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) )
												) );
		                                    echo '</div>';
											echo '<h3 class="blog-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
											if( ! empty( $settings['excerpt_count'] ) ){
												echo '<p class="blog-text">'.wp_kses_post( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
											}
				                            echo '<a href="'.esc_url( get_permalink() ).'" class="'.esc_attr( $settings['btn_class'] ).'">'.esc_html( $settings['read_more_text'] ).'<i class="far fa-arrow-right"></i></a>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
							}elseif( $settings['blog_post_style'] == '6' ){
								echo '<div class="col-xl-4">';
			                    echo '<div class="vs-blog blog-card blog-style5 image-box-hover">';
									if( has_post_thumbnail() ){
										echo '<div class="box-img blog-img">';
											echo '<a href="'.esc_url( get_the_permalink() ).'">';
												the_post_thumbnail( 'home-slider-blog-image-five', array( 'class' => 'w-100' ) );
											echo '</a>';
										echo '</div>';
									}
									echo '<div class="blog-content">';
										echo '<div class="blog-meta">';
											echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
												echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
											echo '</a>';
											
											$wellnez_post_categories = get_the_category();
								            if( is_array( $wellnez_post_categories ) && ! empty( $wellnez_post_categories ) ){
												echo '<span class="category">';
													echo ' <a href="'.esc_url( get_term_link( $wellnez_post_categories[0]->term_id ) ).'">'.esc_html( $wellnez_post_categories[0]->name ).'</a> ';
												echo '</span>';
											}
										echo '</div>';
										if( get_the_title() ){
											echo '<!-- Post Title -->';
											echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
											echo '<!-- End Post Title -->';
										}
			                    	echo '</div>';
			                    echo '</div>';
			                    echo '</div>';
							}else{
                                echo '<div class="col-xl-4">';
                                    echo '<div class="vs-blog blog-style3">';
                                        echo '<span class="blog-number"> 0' .  $counter .'</span>';
                                        if( has_post_thumbnail() ){
                                            echo '<div class="blog-img">';
                                                echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                                    the_post_thumbnail( 'home-slider-blog-image-five', array( 'class' => 'w-100' ) );
                                                echo '</a>';
                                            echo '</div>';
                                        }
                                        echo '<div class="blog-content">';
                                            echo '<div class="blog-meta">';
                                                echo '<a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
                                                    echo '<i class="fal fa-calendar-alt"></i>';
                                                    echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                                                echo '</a>';
                                                
                                                $wellnez_post_categories = get_the_category();
                                                if( is_array( $wellnez_post_categories ) && ! empty( $wellnez_post_categories ) ){
                                                    echo ' <a href="'.esc_url( get_term_link( $wellnez_post_categories[0]->term_id ) ).'">';
                                                        echo '<i class="fal fa-user"></i>';
                                                        echo esc_html( $wellnez_post_categories[0]->name );
                                                    echo '</a>';
                                                }
                                            echo '</div>';
                                            if( get_the_title() ){
                                                echo '<!-- Post Title -->';
                                                echo '<h3 class="blog-title h4"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
                                                echo '<!-- End Post Title -->';
                                            }
                                        echo '</div>';
                                    echo '</div>';
			                    echo '</div>';
                                $counter++; 
                            }
					  	}
						wp_reset_postdata();
			    	echo '</div><!-- .row END -->';
			  	echo '</div><!-- .container END -->';
			echo '</section>';
			echo '<!-- blog Area end -->';
        }
	}
}