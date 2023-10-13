<?php
/**
 * The template for displaying the footer
*/
?>

        <footer class="bg-gray-600">

            <div class="py-15 pt-lg-50 pb-lg-25">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5 offset-lg-2">
                            <div class="d-flex flex-column flex-lg-row">
                                <div class="mb-4 mb-lg-0">
                                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                                        <?php dynamic_sidebar( 'footer-2' ); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="ms-lg-auto">
                                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                                        <?php dynamic_sidebar( 'footer-3' ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="border-top border-dark-c"></div>
                <div class="text-center text-sm py-15 py-lg-25">
                    <span class="d-block color-gray-100">© 2023 EkoSynergia Sp. z o.o. Wszelkie prawa zastrzeżone.</span>
                </div>
            </div>

        </footer>

        <!-- Modal Form 1 -->
        <?php if ( is_active_sidebar( 'modal-form-1' )) : ?>
            <div class="modal fade" id="modalForm1" tabindex="-1" aria-labelledby="modalForm1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <?php dynamic_sidebar( 'modal-form-1' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Modal Form 2 -->
        <?php if ( is_active_sidebar( 'modal-form-2' )) : ?>
            <div class="modal fade" id="modalForm2" tabindex="-1" aria-labelledby="modalForm2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <?php dynamic_sidebar( 'modal-form-2' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Modal Form 3 -->
        <?php if ( is_active_sidebar( 'modal-form-3' )) : ?>
            <div class="modal fade" id="modalForm3" tabindex="-1" aria-labelledby="modalForm3" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <?php dynamic_sidebar( 'modal-form-3' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php wp_footer(); ?>
    </body>
</html>
