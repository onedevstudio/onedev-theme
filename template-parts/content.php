<?php
/**
 * Template part for displaying posts.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ( is_single() ) : ?>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php else : ?>
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <?php endif; ?>
    </header>
</article>

<?php if ( is_search() ) : ?>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
<?php else : ?>
    <div class="entry-content">
        <?php
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_FX ) );
            wp_link_pages( array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', THEME_FX ) . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            ) );
        ?>
    </div>
<?php endif; ?>
