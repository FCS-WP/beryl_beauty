<?php
    use \Elementor\Widget_Base;
    use \Elementor\Controls_Manager;
    use \Elementor\Group_Control_Typography;
    use \Elementor\Group_Control_Background;
    use \Elementor\Group_Control_Text_Shadow;
    use \Elementor\Group_Control_Box_Shadow;
    use \Elementor\Group_Control_Border;
    use \Elementor\Utils;
    /**
     *
     * Project Widget .
     *
     */
class Mixlax_Project extends Widget_Base {

	public function get_name() {
		return 'mixlaxproject';
	}

	public function get_title() {
		return __( 'Projects', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

    public function get_script_depends() {
		return [ 'imagesloaded','isotope' ];
	}

	// Add The Input For User
	protected function _register_controls(){
		$this->start_controls_section(
			'projects_content',
			[
				'label'		=> __( 'Project Content','mixlax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'post_from',
			[
				'label' 		=> __( 'Post From', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> __( 'All', 'mixlax' ),
					'categories' 	=> __( 'Categories', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'categories',
			[
				'label' 		=> __( 'Post From', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> mixlax_projects_category(),
				'condition' 	=> ['post_from' => 'categories'],
			]
		);
		$this->add_control(
			'post_limit',
			[
				'label' 		=> __( 'Post Limit', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder'	=> __( 'Only Number Work. Like 4 or 6', 'mixlax' ),
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> __( 'Order', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> __( 'Ascending', 'mixlax' ),
					'DESC' 			=> __( 'Descending', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'order_by',
			[
				'label' 		=> __( 'Order By', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> __( 'None', 'mixlax' ),
					'type' 			=> __( 'Type', 'mixlax' ),
					'title' 		=> __( 'Title', 'mixlax' ),
					'name' 			=> __( 'Name', 'mixlax' ),
					'date' 			=> __( 'Date', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'load_more_text',
			[
				'label' 		=> __( 'Load More Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'placeholder'	=> __( 'Load More', 'mixlax' ),
			]
		);
		$this->add_control(
			'load_more_text_url',
			[
				'label' 		=> __( 'Button Text Url', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();


	}

	// Output For User
	protected function render(){
		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'column', 'class', 'col-auto pb-30 grid-item' );

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		echo '<!-- project style one -->';
			if( $settings['post_from'] == "categories" ){
			   $project = array(
				   'post_type'         => 'mixlax_project',
				   'posts_per_page'    => esc_attr( $settings['post_limit'] ),
				   'order'             => esc_attr( $settings['order'] ),
				   'orderby'           => esc_attr( $settings['order_by'] ),
				   'tax_query'         => array(
						    array(
							   'taxonomy'  => 'project_category',
							   'field'     => 'slug',
							   'terms'     => esc_attr( $settings['categories'] ),
						    )
					),
                    'paged'             => $paged,
			   );
		    }else{
				$project = array(
				   'post_type'         => 'mixlax_project',
				   'posts_per_page'    => esc_attr( $settings['post_limit'] ),
				   'order'             => esc_attr( $settings['order'] ),
				   'orderby'           => esc_attr( $settings['order_by'] ),
                   'paged'             => $paged,
			    );
		    }

		$mixlax_project = new WP_Query( $project );

		if( $mixlax_project->have_posts() ){
            echo '<section class="vs-gallery-wrapper vs-gallery-layout1">';
                echo '<div class="container">';
                    echo '<div class="row filter-active">';
						while( $mixlax_project->have_posts() ):
							$mixlax_project->the_post();
							echo '<!-- Single Project -->';
							echo '<div '.$this->get_render_attribute_string( 'column' ).'>';
								if( has_post_thumbnail() ){
									echo '<div class="project-img">';
                                        echo '<a href="'.esc_url( get_the_permalink() ).'">';
										    the_post_thumbnail( );
                                        echo '</a>';
									echo '</div>';
								}
							echo '</div>';
						endwhile;
						wp_reset_postdata();

					echo '</div><!-- .row END -->';
                    if( ! empty( $settings['load_more_text'] ) ){
                        echo '<div class="row">';
                            echo '<div class="col-12 text-center pt-lg-4">';
                                echo '<a href="'.esc_url( $settings['load_more_text_url'] ).'" class="vs-btn wave-style2">'.esc_html( $settings['load_more_text'] ).' <i class="far fa-plus"></i></a>';
                            echo '</div>';
                        echo '</div>';
                    }
				echo '</div><!-- .container END -->';
			echo '</section>';
		}
	}
}