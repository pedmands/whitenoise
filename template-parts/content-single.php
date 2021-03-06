<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package White_Noise
 */

?>
<?php global $first_post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            
            <?php if (has_post_thumbnail()) { ?>
                <figure class="featured-image">
                    <?php if ($first_post == true ) { ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php } else { 
                        the_post_thumbnail();
                    } ?>
                </figure>
            <?php } ?>
            
		<?php
                    if ($first_post == true ) {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    } else {
			the_title( '<h1 class="entry-title">', '</h1>' );
                    }
                    
                    if (has_excerpt($post->ID)) {
                        echo '<div class="deck">';
                        echo '<p>' . get_the_excerpt(). '</p>';
                        echo '</div>';
                    }

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php whitenoise_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'whitenoise' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whitenoise' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php whitenoise_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
