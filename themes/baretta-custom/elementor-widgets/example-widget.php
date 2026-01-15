<?php
/**
 * Elementor Custom Widget Example
 *
 * @package BarettaCustom
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Example Custom Elementor Widget
 */
class Baretta_Example_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'baretta_example_widget';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return __('Baretta Example', 'baretta-custom');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * Get widget categories
     */
    public function get_categories() {
        return ['baretta-custom'];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['baretta', 'custom', 'example'];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'baretta-custom'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'baretta-custom'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Example Title', 'baretta-custom'),
                'placeholder' => __('Type your title here', 'baretta-custom'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'baretta-custom'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Example description text.', 'baretta-custom'),
                'placeholder' => __('Type your description here', 'baretta-custom'),
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'baretta-custom'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'baretta-custom'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .baretta-example-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .baretta-example-title',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="baretta-example-widget">
            <?php if (!empty($settings['title'])) : ?>
                <h3 class="baretta-example-title">
                    <?php echo esc_html($settings['title']); ?>
                </h3>
            <?php endif; ?>

            <?php if (!empty($settings['description'])) : ?>
                <div class="baretta-example-description">
                    <?php echo wp_kses_post($settings['description']); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * Render widget output in the editor (optional)
     */
    protected function content_template() {
        ?>
        <#
        if (settings.title) { #>
            <h3 class="baretta-example-title">{{{ settings.title }}}</h3>
        <# }

        if (settings.description) { #>
            <div class="baretta-example-description">{{{ settings.description }}}</div>
        <# } #>
        <?php
    }
}

// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register(new Baretta_Example_Widget());
