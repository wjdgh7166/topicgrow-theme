<?php get_header(); ?>

<main class="wrap">

  <?php if (have_posts()) : ?>

    <?php
    $shown_featured = false;
    $count = 0;
    while (have_posts()) : the_post();
      $count++;

      if (!$shown_featured) :
        $shown_featured = true;
        ?>
        <section class="hero">
          <a class="hero-card" href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <div class="hero-media"><?php the_post_thumbnail('full'); ?></div>
            <?php endif; ?>
            <div class="hero-overlay">
              <?php $cats = get_the_category(); if (!empty($cats)) : ?>
                <span class="hero-tag"><?php echo esc_html($cats[0]->name); ?></span>
              <?php endif; ?>
              <?php if (topicgrow_is_new_post()) : ?>
                <span class="new-badge">NEW</span>
              <?php endif; ?>
              <h1 class="hero-title"><?php the_title(); ?></h1>
              <p class="hero-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
              <div class="hero-meta">
                <?php echo get_avatar(get_the_author_meta('ID'), 24, '', '', ['class' => 'avatar']); ?>
                <span><?php the_author(); ?> · <?php echo get_the_date('Y.m.d'); ?></span>
              </div>
            </div>
          </a>
        </section>

        <div class="section-title">
          <h2>LATEST</h2>
          <span>최신 콘텐츠</span>
        </div>

        <section class="grid">
        <?php
        continue;
      endif;
      ?>

      <article class="card">
        <a class="card-img" href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()) the_post_thumbnail('medium_large'); ?>
        </a>
        <div class="card-body">
          <?php $cats = get_the_category(); if (!empty($cats)) : ?>
            <span class="tag"><?php echo esc_html($cats[0]->name); ?></span>
          <?php endif; ?>
          <?php if (topicgrow_is_new_post()) : ?>
            <span class="new-badge">NEW</span>
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>" class="card-title"><?php the_title(); ?></a>
          <p class="card-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
          <div class="card-footer">
            <?php echo get_avatar(get_the_author_meta('ID'), 20, '', '', ['class' => 'avatar']); ?>
            <span class="card-author"><?php the_author(); ?></span>
            <span class="card-date"><?php echo get_the_date('Y.m.d'); ?></span>
          </div>
        </div>
      </article>

    <?php endwhile; ?>
    </section>

    <div class="wrap" style="padding:40px 0;">
      <?php the_posts_pagination(); ?>
    </div>

  <?php else : ?>
    <div class="wrap" style="padding:80px 0; text-align:center;">
      <p>게시물이 없습니다.</p>
    </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
