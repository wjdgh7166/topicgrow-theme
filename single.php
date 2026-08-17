<?php get_header(); ?>

<main class="wrap">
  <?php while (have_posts()) : the_post(); ?>
    <article class="single-post">
      <?php $cats = get_the_category(); if (!empty($cats)) : ?>
        <span class="single-tag"><?php echo esc_html($cats[0]->name); ?></span>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
      <div class="single-meta">
        <?php echo get_avatar(get_the_author_meta('ID'), 20, '', '', ['class' => 'avatar']); ?>
        <span><?php the_author(); ?> · <?php echo get_the_date('Y.m.d'); ?></span>
      </div>
      <?php if (has_post_thumbnail()) : ?>
        <div class="single-thumb"><?php the_post_thumbnail('full'); ?></div>
      <?php endif; ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <div class="author-box">
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author-box-avatar">
          <?php echo get_avatar(get_the_author_meta('ID'), 64, '', '', ['class' => 'avatar']); ?>
        </a>
        <div class="author-box-body">
          <p class="author-box-label">이 글을 쓴 사람 — <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author-box-name"><?php the_author(); ?></a></p>
          <p class="author-box-bio"><?php echo esc_html(get_the_author_meta('description')); ?></p>
          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author-box-more"><?php the_author(); ?>이 쓴 다른 글 보기</a>
        </div>
      </div>

      <?php
      $cat_ids = wp_get_post_categories(get_the_ID());
      $related = new WP_Query([
          'category__in'   => $cat_ids,
          'post__not_in'   => [get_the_ID()],
          'posts_per_page' => 3,
          'ignore_sticky_posts' => true,
      ]);
      if ($related->have_posts()) :
      ?>
        <div class="related">
          <div class="related-title">관련 글</div>
          <div class="related-grid">
            <?php while ($related->have_posts()) : $related->the_post(); ?>
              <article class="card">
                <a class="card-img" href="<?php the_permalink(); ?>">
                  <?php if (has_post_thumbnail()) the_post_thumbnail('medium_large'); ?>
                </a>
                <div class="card-body">
                  <?php $rcats = get_the_category(); if (!empty($rcats)) : ?>
                    <span class="tag"><?php echo esc_html($rcats[0]->name); ?></span>
                  <?php endif; ?>
                  <a href="<?php the_permalink(); ?>" class="card-title"><?php the_title(); ?></a>
                  <div class="card-footer">
                    <span class="card-date"><?php echo get_the_date('Y.m.d'); ?></span>
                  </div>
                </div>
              </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
