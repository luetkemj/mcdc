			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">



				<div id="sidebar1" class="sidebar threecol first clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>

				<div id="sidebar2" class="sidebar threecol clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
				
				<div id="sidebar3" class="sidebar threecol clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar3' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>

				<div id="sidebar4" class="sidebar threecol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar4' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>



					<p class="source-org copyright clear">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
					<p>
						<a target="blank" href="https://plus.google.com/+Makingcomics" rel="publisher">Google+</a> &nbsp; <a target="blank" href="https://www.facebook.com/makingcomics">Facebook</a> &nbsp; <a target="blank" href="https://twitter.com/Making_Comics">Twitter</a> &nbsp; <a target="blank" href="http://makingcomicsdotcom.tumblr.com/">Tumblr</a>
					</p>
				</div> <?php // end #inner-footer ?>

			</footer> <?php // end footer ?>

		</div> <?php // end #container ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <?php // end page. what a ride! ?>
