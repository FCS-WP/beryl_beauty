<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
/**
 *
 * Separator Widget .
 *
 */
class Mixlax_Separator extends Widget_Base {

	public function get_name() {
		return 'mixlaxseparator';
	}

	public function get_title() {
		return __( 'Separator', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'separator_section',
			[
				'label' 	=> __( 'Separator', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'separator_style',
			[
				'label' 		=> __( 'Separator Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
		
		$this->add_control(
			'separator_icon_class',
			[
				'label' 		=> __( 'Icon Class', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'flaticon-taxi-1', 'mixlax' ),
			]
		);
		$this->add_control(
			'separator_border_color',
			[
				'label' 		=> __( 'Separator Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .separator-layout2 .sec-separator .shape' => 'border-color: {{VALUE}}',
				],
				'condition'		=> ['separator_style' => 'two'],
			]
		);
		$this->add_control(
			'separator_bg_color',
			[
				'label' 		=> __( 'Separator Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-separator:after,{{WRAPPER}} .sec-separator:before' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'round_bg_color',
			[
				'label' 		=> __( 'Round Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-separator span' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-separator span i' => 'color: {{VALUE}}',
				],
			]
		);
		
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		if( $settings['separator_style'] == 'two' ){
			$class = 'separator-layout2';
		}else{
			$class = '';
		}
		echo '<!-- Section Separator -->';
		echo '<div class="separator-wrap '.esc_attr( $class ).'">';
		  	echo '<div class="container ">';
		    	echo '<div class="sec-separator">';
					if( ! empty( $settings['separator_icon_class'] ) ){
			      		echo '<i class="shape"></i>';
			      		echo '<span><i class="'.esc_attr( $settings['separator_icon_class'] ).'"></i></span>';
				  	}
		    	echo '</div>';
		  	echo '</div>';
		echo '</div>';
		echo '<!-- Section Separator end -->';
	}

}