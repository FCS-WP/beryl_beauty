<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * News Feed Widget .
 *
 */
class Mixlax_News_Feed extends Widget_Base {

	public function get_name() {
		return 'mixlaxnewsfeed';
	}

	public function get_title() {
		return __( 'News Feed', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'news_feed_section',
			[
				'label'     => __( 'News Feed', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'news_feed_style',
			[
				'label' 	=> __( 'News Feed Style', 'mixlax' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   => __( 'Style One', 'mixlax' ),
                    '2'   => __( 'Style Two', 'mixlax' ),
                    '3'   => __( 'Style Three', 'mixlax' ),
                ],
                'default'  => '1'
			]
        );
		
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'default'  	=> __( 'News Feed', 'mixlax' ),
			]
        );
		
		$this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '3', 'mixlax' )
			]
		);
		
		$this->add_control(
			'title_count',
			[
				'label' 		=> __( 'Title Length', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'  		=> __( '6', 'mixlax' ),
			]
		);
		
		$this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options'   => [
					'ASC'   	=> __('ASC','mixlax'),
					'DESC'   	=> __('DESC','mixlax'),
				],
				'default'  => 'DESC'
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
			'news_feed_style_section',
			[
				'label'     => __( 'Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'section_title_color',
			[
				'label'     => __( 'Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_title,{{WRAPPER}} .footer-layout2 .widget_recent_entries .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'section_title_typography',
				'label'     => __( 'Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_title,{{WRAPPER}} .footer-layout2 .widget_recent_entries .widget_title',
			]
        );
        $this->add_control(
			'post_title_color',
			[
				'label'     => __( 'Post Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content .blog-title,{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content .blog-title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'post_title_hover_color',
			[
				'label'     => __( 'Post Title Hover Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content .blog-title a:hover,{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content .blog-title a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'post_title_typography',
				'label'     => __( 'Post Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content .blog-title,{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content .blog-title',
			]
        );
		$this->add_control(
			'date_color',
			[
				'label'     => __( 'Date Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content span,{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content span' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'date_hover_color',
			[
				'label'     => __( 'Date Hover Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content span a:hover,{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content span a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'date_typography',
				'label'     => __( 'Post Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .footer-layout2 .widget_recent_entries .blog .blog-content span,{{WRAPPER}} .footer-layout3 .footer-wid-wrap .widget_recent_entries .blog .blog-content span',
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
			if( $settings['news_feed_style'] == '1' ){
				echo '<div class="footer-layout2">';
					echo '<div class="widget footer-widget widget_recent_entries">';
						if( !empty( $settings['section_title'] ) ){
							echo '<!-- title -->';
							echo '<h3 class="widget_title">'.esc_html( $settings['section_title'] ).'</h3>';
						}
						while( $blogpost->have_posts() ) {
							$blogpost->the_post();
							echo '<!-- Single Post -->';
							echo '<div class="blog">';
								if( has_post_thumbnail() ) {
									echo '<!-- Blog Image -->';
									echo '<div class="blog-img">';
										echo '<a href="'.esc_url( get_the_permalink() ).'">';
										   the_post_thumbnail( 'widget-post-thumbnail' );
										echo '</a>';
									echo '</div>';
								}
								echo '<div class="blog-content">';
									echo '<span><i class="fal fa-calendar"></i><a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
										echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
									echo '</a></span>';
									if( get_the_title() ){
										$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 12;
										echo '<h4 class="blog-title"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h4>';
									}
								echo '</div>';
							echo '</div>';
						}
					  	wp_reset_postdata();
					echo '</div>';
				echo '</div>';
			}elseif( $settings['news_feed_style'] == '2' ){
				echo '<div class="footer-layout3">';
					echo '<div class="footer-wid-wrap">';
						echo '<div class="widget footer-widget widget_recent_entries">';
							if( !empty( $settings['section_title'] ) ){
								echo '<!-- title -->';
								echo '<h3 class="widget_title">'.esc_html( $settings['section_title'] ).'</h3>';
							}
							while( $blogpost->have_posts() ) {
								$blogpost->the_post();
				              	echo '<!-- Single Post -->';
					            echo '<div class="blog">';
									if( has_post_thumbnail() ) {
										echo '<!-- Blog Image -->';
										echo '<div class="blog-img">';
											the_post_thumbnail( 'widget-post-thumbnail-two' );
										echo '</div>';
									}
					                echo '<div class="blog-content">';
										if( get_the_title() ){
											$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 12;
											echo '<h4 class="blog-title"><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h4>';
										}
										echo '<span><a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
											echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
										echo '</a></span>';
					                echo '</div>';
					            echo '</div>';
							}
							wp_reset_postdata();
			            echo '</div>';
	            	echo '</div>';
	            echo '</div>';
			}else{
				if( $blogpost->have_posts() ){
					echo '<div class="footer-layout4">';
						echo '<div class="widget footer-widget ">';
							if( !empty( $settings['section_title'] ) ){
								echo '<!-- title -->';
								echo '<h3 class="widget_title mb-4">'.esc_html( $settings['section_title'] ).'</h3>';
							}
							echo '<div class="vs-widget-recent-post">';
								while( $blogpost->have_posts() ) {
									$blogpost->the_post();
									echo '<div class="recent-post media align-items-center">';
										if( has_post_thumbnail() ) {
											echo '<!-- Blog Image -->';
											echo '<div class="media-img">';
												the_post_thumbnail( 'widget-post-thumbnail-three' );
											echo '</div>';
										}
										echo '<div class="media-body pl-20">';
											if( get_the_title() ){
												$mixlax_title_length = $settings['title_count'] ? $settings['title_count'] : 12;
												echo '<h4 class="recent-post-title h6 "><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(),$mixlax_title_length, '' ) ).'</a></h4>';
											}
											echo '<span class="text-primary2"><i class="fal fa-calendar-alt text-primary2"></i><a href="'.esc_url( wellnez_blog_date_permalink() ).'">';
											echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
											echo '</a></span>';
										echo '</div>';
									echo '</div>';
								}
								wp_reset_postdata();
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			}
        }
	}
}