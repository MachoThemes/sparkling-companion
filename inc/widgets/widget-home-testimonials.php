<?php

/**
 * Homepage parralax section Widget
 * Sparkling Theme
 */
class sparkling_home_testimonial extends WP_Widget {
	function __construct() {

		$widget_ops = array(
			'classname'                   => 'sparkling_home_testimonial',
			'description'                 => esc_html__( "Sparkling Testimonial Widget Section", 'sparkling' ),
			'customize_selective_refresh' => true
		);
		parent::__construct( 'sparkling_home_testimonial', esc_html__( '[Sparkling] Testimonial Section For FrontPage', 'sparkling' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title     = isset( $instance['title'] ) ? $instance['title'] : esc_html__( 'People just like you are already loving Colorlib', 'sparkling' );
		// $limit     = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		$image_src = isset( $instance['image_src'] ) ? $instance['image_src'] : '';
		$testimonials = isset( $instance['testimonials'] ) ? $instance['testimonials'] : array( 'img' => array(), 'name' => array(), 'testimonial' => array() );

		$testimonials_count = max( count( $testimonials['img'] ), count( $testimonials['name'] ), count( $testimonials['testimonial'] ) );

		echo $before_widget;

		/**
		 * Widget Content
		 */
		?>

		<?php

		if ( !empty( $testimonials ) ) : ?>
			<section class="parallax-section testimonial-section">
			<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url($image_src); ?>"
			     style="height: 500px;">
				<div class="container align-transform">
					<div class="parallax-text image-bg testimonial">
						<div class="row">
							<div class="col-sm-12 text-center section-header">
								<h3><?php echo wp_kses_post( $title ); ?></h3>
							</div>
						</div>
						<!--end of row-->
						<div class="row">
							<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
								<div class="text-slider slider-arrow-controls text-center relative">
									<ul class="slides" style="overflow: hidden;"><?php
										for ( $i = 0; $i < $testimonials_count; $i ++ ){ ?>
											<?php if ( isset( $testimonials['name'][$i] ) ) : ?>
												<li>
													<?php if ( isset( $testimonials['testimonial'][$i] ) && $testimonials['testimonial'][$i] != '' ): ?>
														<p><?php echo wp_kses_post($testimonials['testimonial'][$i]); ?></p>
													<?php endif ?>
													
													<div class="testimonial-author-section">
													<?php if ( isset( $testimonials['img'][$i] ) && $testimonials['img'][$i] != '' ): ?>
														<img src="<?php echo esc_url($testimonials['img'][$i]); ?>" class="testimonial-img">
													<?php endif ?>
														<div class="testimonial-author">
															<?php if ( isset( $testimonials['name'][$i] ) && $testimonials['name'][$i] != '' ): ?>
																<strong><?php echo esc_html($testimonials['name'][$i]); ?></strong>
															<?php endif ?>
														</div>
													</div>
												</li>
											<?php endif; ?>

										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<!--end of row-->
					</div>
				</div>
				<!--end of container-->
			</div>
			</section><?php
		endif;
		wp_reset_postdata();
		echo $after_widget;
	}


	function form( $instance ) {
		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = '';
		}
		if ( ! isset( $instance['image_src'] ) ) {
			$instance['image_src'] = '';
		}
		if ( isset($instance['testimonials']) ) {
			$testimonials = $instance['testimonials'];
		}else{
			$testimonials = array(
				'img' => array( '' ),
				'name' => array( '' ),
				'testimonial' => array( '' ),
				);
		}

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title ', 'sparkling' ) ?></label>
			<input type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       class="widefat"/>
		</p>

		<!-- <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( 'Limit ', 'sparkling' ) ?></label>

			<input type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>"
			       id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"
			       class="widefat"/>
		</p> -->

		<p class="sparkling-media-control" data-delegate-container="<?php echo esc_attr( $this->get_field_id( 'image_src' ) ) ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'image_src' ) ); ?>"><?php _e( 'Background Parallax Image:', 'sparkling' ); ?>:</label>

			<img src="<?php echo esc_url( $instance['image_src'] ); ?>"/>

			<input type="hidden"
			       name="<?php echo esc_attr( $this->get_field_name( 'image_src' ) ); ?>"
			       id="<?php echo esc_attr( $this->get_field_id( 'image_src' ) ); ?>"
			       value="<?php echo esc_url( $instance['image_src'] ); ?>"
			       class="image-id blazersix-media-control-target">

			<button type="button" class="button upload-button"><?php _e( 'Choose Image', 'sparkling' ); ?></button>
		</p>
		<ul class="testimonial-sortable clone-wrapper"><?php

		$testimonials_count = ( isset( $testimonials['img'] ) && count( $testimonials['img'] ) > 0 ) ? count( $testimonials['img'] ) : 3;

		for ( $i = 0; $i < $testimonials_count; $i ++ ): ?>
			<li class="toclone">
				<br>
				<p class="sparkling-media-control"
				   data-delegate-container="<?php echo esc_attr( $this->get_field_id( 'testimonials' ) . '-' . absint( $i ) ) ?>">
					<label
						class="logo_heading"
						for="<?php echo esc_attr( $this->get_field_id( 'testimonials' ) . '-' . absint( $i ) ); ?>"><?php _e( 'Author Image #', 'sparkling' );
						?><span class="count"><?php echo absint( $i ) + 1; ?></span>:</label>

					<img src="<?php echo ( isset( $testimonials['img'][$i] ) ) ? esc_url( $testimonials['img'][$i] ) : ''; ?>"/>

					<input type="hidden"
					       name="<?php echo esc_attr( $this->get_field_name( 'testimonials' ) . '[img][' . $i . ']' ); ?>"
					       id="<?php echo esc_attr( $this->get_field_id( 'testimonials' ) . '-' . (int) $i ); ?>"
					       value="<?php echo ( isset( $testimonials['img'][$i] ) ) ? esc_url( $testimonials['img'][$i] ) : ''; ?>"
					       class="testimonial-img image-id blazersix-media-control-target">

					<button type="button"
					        class="button upload-button"><?php _e( 'Choose Image', 'sparkling' ); ?></button>
				</p>

				<label><?php _e( 'Author Name:', 'sparkling' ); ?></label>
				<input name="<?php echo esc_attr( $this->get_field_name( 'testimonials' ) . '[name][' . $i . "]" ); ?>"
				       id="author-name<?php echo esc_attr( '-' . absint( $i ) ); ?>" class="widefat testimonial-name" type="text"
				       size="36"
				       value="<?php echo ( isset( $testimonials['name'][$i] ) ) ? esc_html( $testimonials['name'][$i] ) : ''; ?>"/>

				<label><?php _e( 'Testimonial:', 'sparkling' ); ?></label>
				<textarea 
						name="<?php echo esc_attr( $this->get_field_name( 'testimonials' ) . '[testimonial][' . $i . "]" ); ?>"
				       	id="testimonial-content<?php echo esc_attr( '-' . absint( $i ) ); ?>" class="widefat testimonial-content" type="text"><?php echo ( isset( $testimonials['testimonial'][$i] ) ) ? wp_kses_post( $testimonials['testimonial'][$i] ) : ''; ?></textarea><br><br>

				<a href="#" class="clone button-primary"><?php _e( 'Add', 'sparkling' ); ?></a>
				<a href="#" class="delete button"><?php _e( 'Delete', 'sparkling' ); ?></a>
			</li>
		<?php endfor; ?>
		</ul>		

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? wp_kses_post( $new_instance['title'] ) : '';
		$instance['limit']     = ( ! empty( $new_instance['limit'] ) && is_numeric( $new_instance['limit'] ) ) ? absint( $new_instance['limit'] ) : '';
		$instance['image_src'] = ( ! empty( $new_instance['image_src'] ) ) ? esc_url_raw( $new_instance['image_src'] ) : '';

		// Save testimonial
		if ( isset( $new_instance['testimonials']['img'] ) && count( $new_instance['testimonials']['img'] ) != 0 ) {
			for ( $i = 0; $i < count( $new_instance['testimonials']['img'] ); $i ++ ) {
				$instance['testimonials']['img'][ $i ] = ( ! empty( $new_instance['testimonials']['img'][ $i ] ) ) ? esc_url_raw( $new_instance['testimonials']['img'][ $i ] ) : '';
			}
		}
		if ( isset( $new_instance['testimonials']['name'] ) && count( $new_instance['testimonials']['name'] ) != 0 ) {
			for ( $i = 0; $i < count( $new_instance['testimonials']['name'] ); $i ++ ) {
				$instance['testimonials']['name'][ $i ] = ( ! empty( $new_instance['testimonials']['name'][ $i ] ) ) ? esc_html( $new_instance['testimonials']['name'][ $i ] ) : '';
			}
		}
		if ( isset( $new_instance['testimonials']['testimonial'] ) && count( $new_instance['testimonials']['testimonial'] ) != 0 ) {
			for ( $i = 0; $i < count( $new_instance['testimonials']['testimonial'] ); $i ++ ) {
				$instance['testimonials']['testimonial'][ $i ] = ( ! empty( $new_instance['testimonials']['testimonial'][ $i ] ) ) ? wp_kses_post( $new_instance['testimonials']['testimonial'][ $i ] ) : '';
			}
		}

		return $instance;
	}

}

?>
