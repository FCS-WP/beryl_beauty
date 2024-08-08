<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Wellnez_List_Info extends Widget_Base {

	public function get_name() {
		return 'wellnezinfotitle';
	}

	public function get_title() {
		return __( 'Info List', 'wellnez' );
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
				'label'		 	=> __( 'Info List', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'section_info_layout',
			[
				'label' => __( 'Layout', 'wellnez' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( 'Layout 1', 'wellnez' ),
					'2' => __( 'Layout 2', 'wellnez' ),
				],
			]
		);

        $this->add_control(
			'info_label',
			[
				'label' 	=> __( 'Label', 'wellnez' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'   => __('Address :', 'wellnez'),
                'label_block' => true,
			]
        );

        $this->add_control(
			'info_text',
			[
				'label' 	=> __( 'Text', 'wellnez' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'   => __('Centerl Park West LA87, New York', 'wellnez'),
                'label_block' => true,
			]
        );
		

		
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $info_label = $settings['info_label'];
        $info_text = $settings['info_text'];


        ?>
        <div class="contact-table">
            <?php if( '1' == $settings['section_info_layout'] ): ?>
                <div class="tr">
                    <div class="tb-col">
                        <?php if(!empty($info_label)): ?>
                            <?php echo wp_kses_post($info_label);  ?>
                        <?php endif; ?>

                        <?php if(!empty($info_text)): ?>
                            <?php echo wp_kses_post($info_text); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if( '2' == $settings['section_info_layout'] ): ?>
                <div class="tr">
                    <?php if(!empty($info_label)): ?>
                        <div class="tb-col">
                            <?php echo wp_kses_post($info_label);  ?>
                        </div>
                    <?php endif; ?>
                    <div class="tb-col">
                        <?php echo wp_kses_post($info_text); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php

        
	}
}