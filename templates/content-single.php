<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php
      medm_article_author_box();
      ?>
    </header>

    <div class="inner-entry">
      <div class="featured-image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>

      <h2 class="title">
        <?php the_title(); ?>
      </h2>

      <div class="summary">
        <?php the_content(); ?>
      </div>
    </div>

    <div class="post-tags">
      <?php
      $tags = get_the_tags();

      if ( $tags ) {
        foreach ( $tags as $tag ) {
          $tag_id = $tag->term_id;
          printf( '<a href="%s" class="tag-link-%s" title="%s">%s</a>',
            get_tag_link( $tag_id ),
            $tag_id,
            $tag->description,
            $tag->name
          );
        }
      }
      ?>
    </div>

    <footer>
      <?php
      wp_link_pages( [
        'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'medm' ),
        'after'  => '</p></nav>',
      ] );
      ?>
    </footer>

    <?php comments_template( '/templates/comments.php' ); ?>
  </article>
<?php endwhile;
