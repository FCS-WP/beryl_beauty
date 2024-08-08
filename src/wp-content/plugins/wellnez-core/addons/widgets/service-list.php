<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\repeater;
/**
 *
 * Section Title Widget .
 *
 */
class Wellnez_Service_List extends Widget_Base {

	public function get_name() {
		return 'wellnezservicelist';
	}

	public function get_title() {
		return __( 'Service List', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_info_section',
			[
				'label'		 	=> __( 'Service List', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_title', [
				'label' 		=> __( 'Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Health & Vitality' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);
       
        $repeater = new Repeater();


        $repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Health & Vitality' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'details_url',
			[
				'label' 		=> __( 'Details Url', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'lists',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Alax Markun', 'wellnez' ),
						'details_url' 	=> __( 'Health & Vitality', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        ?>
			<div class="service-box">
				<?php if(!empty( $settings[ 'service_title' ] ) ):  ?>
					<h3 class="box-title"><?php echo esc_html($settings[ 'service_title' ]); ?></h3>
				<?php endif; ?>

				<ul class="list-unstyled">
					<?php foreach( $settings[ 'lists' ] as $list ): ?>
						<li>
							<a href="<?php echo esc_url( $list[ 'details_url' ][ 'url' ] ); ?>">
								<?php echo esc_html( $list[ 'name' ] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
        <?php
	}
}