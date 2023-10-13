<?php
/**
 * The template for displaying 404 pages (not found)
*/
?>
<?php get_header(); ?>
<section class="error-404 not-found py-4 py-lg-50">
    <div class="container text-center">
        <h1 class="mb-3">404</h1>
        <p class="alert alert-info mb-4"><?php esc_html_e('Strony nie znaleziono.', 'energiadirect'); ?></p>
        <a class="btn btn-primary" href="<?php echo esc_url( home_url() ); ?>" role="button"><?php esc_html_e('Strona główna &raquo;', 'energiadirect'); ?></a>
    </div>
</section><!-- .error-404 -->
<?php get_footer(); ?>