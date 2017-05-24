<?php

/**
 * Homepage parralax section Widget
 * Sparkling Theme
 */
class sparkling_home_portfolio extends WP_Widget {
	function __construct() {

		$widget_ops = array(
			'classname'                   => 'sparkling_home_portfolio',
			'description'                 => esc_html__( "Sparkling Porfolio for Home Widget Section", 'sparkling' ),
			'customize_selective_refresh' => true
		);
		parent::__construct( 'sparkling_home_portfolio', esc_html__( '[Sparkling] Porfolio for Home Widget Section', 'sparkling' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title        = isset( $instance['title'] ) ? $instance['title'] : '';
		$body_content = isset( $instance['body_content'] ) ? $instance['body_content'] : '';

		if ( post_type_exists( 'sparkling_portfolio' ) ) {

			echo $before_widget;

			/**
			 * Widget Content
			 */
			?>
			<section class="projects bg-dark pb0">
				<div class="container">
					<div class="col-sm-12 text-center">
						<h3 class="mb32"><?php echo wp_kses_post( $title ); ?></h3>
						<p class="mb40"><?php echo wp_kses_post( $body_content ); ?></p>
					</div>
				</div><?php

				$portfolio_args = array(
					'post_type'           => 'sparkling_portfolio',
					'posts_per_page'      => 10,
					'ignore_sticky_posts' => 1
				);

				$portfolio_query = new WP_Query( $portfolio_args );

				if ( $portfolio_query->have_posts() ) : ?>

					<div class="row masonry-loader fixed-center fadeOut">
						<div class="col-sm-12 text-center">
							<div class="spinner"></div>
						</div>
					</div>
					<div class="row masonry masonryFlyIn fadeIn"><?php

					while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();

						if ( has_post_thumbnail() ) { 

							$permalink = get_the_permalink();
							$url = get_post_meta( get_the_ID(), 'sparkling_companion_portfolio_link', true );
							if ( $url ) {
								$permalink = $url;
							}

							?>
							<div class="col-md-3 col-sm-6 masonry-item project fadeIn p0">
							<div class="image-tile inner-title hover-reveal text-center">
								<a href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'sparkling-portfolio-big' ); ?>
									<div class="title"><?php
										the_title( '<h5 class="mb0">', '</h5>' );

										$project_types = wp_get_post_terms( get_the_ID(), 'sparkling_portfolio_type', array( "fields" => "names" ) );
										if ( ! empty( $project_types ) ) {
											echo '<span>' . implode( ' / ', $project_types ) . '</span>';
										} ?>
									</div>
								</a>
							</div>
							</div><?php
						}
					endwhile; ?>
					</div><?php
				endif;
				wp_reset_postdata(); ?>
			</section>


			<?php

			echo $after_widget;

		}
	}


	function form( $instance ) {
		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = '';
		}
		if ( ! isset( $instance['body_content'] ) ) {
			$instance['body_content'] = '';
		}
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title ', 'sparkling' ) ?></label>

			<input type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       class="widefat"/>
		</p>

		<p><label
			for="<?php echo esc_attr( $this->get_field_id( 'body_content' ) ); ?>"><?php esc_html_e( 'Content ', 'sparkling' ) ?></label>

		<textarea name="<?php echo esc_attr( $this->get_field_name( 'body_content' ) ); ?>"
		          id="<?php echo esc_attr( $this->get_field_id( 'body_content' ) ); ?>"
		          class="widefat"><?php echo wp_kses_post( $instance['body_content'] ); ?></textarea>
		</p><?php
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
		$instance                 = array();
		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? wp_kses_post( $new_instance['title'] ) : '';
		$instance['body_content'] = ( ! empty( $new_instance['body_content'] ) ) ? wp_kses_post( $new_instance['body_content'] ) : '';

		return $instance;
	}

}

?>
