<?php get_header(); ?>

<main class="wrap">
  <?php while (have_posts()) : the_post(); ?>
    <article class="single-post">
      <?php $cats = get_the_category(); if (!empty($cats)) : ?>
        <span class="single-tag"><?php echo esc_html($cats[0]->name); ?></span>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
      <div class="single-meta">
        <?php the_author(); ?> · <?php echo get_the_date('Y.m.d'); ?>
      </div>
      <?php if (has_post_thumbnail()) : ?>
        <div class="single-thumb"><?php the_post_thumbnail('full'); ?></div>
      <?php endif; ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
