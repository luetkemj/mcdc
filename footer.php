			<footer class="footer clearfix" role="contentinfo">
				
				
				
				<div id="inner-footer" class="wrap clearfix">

					<div id="sidebar1" class="sidebar clearfix" role="complementary">

						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar1' ); ?>

						<?php endif; ?>

					</div>

					<div id="sidebar2" class="sidebar clearfix" role="complementary">

						<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar2' ); ?>

						<?php endif; ?>

					</div>
					
					<div id="sidebar3" class="sidebar clearfix" role="complementary">

						<?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar3' ); ?>

						<?php endif; ?>

					</div>

					<div id="sidebar4" class="sidebar clearfix" role="complementary">

						<?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar4' ); ?>

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

		<?php if ( !are_we_live() ){
	    echo get_development_scripts();
		} ?>


	</body>

</html> <?php // end page. what a ride! ?>
