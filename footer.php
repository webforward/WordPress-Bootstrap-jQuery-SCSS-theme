            <?php
            if (get_field('enable_footer_logos')) require('sections/footer_logos.php');

            if (!is_front_page()) require('sections/footer_boxes.php');

            if (is_front_page()) require 'sections/homepage-people.php';
            else require 'snippets/people.php';

            require('snippets/modal.php');
            ?>
            </div>
            <footer id="footer" data-turbo-permanent class="pt-3 pb-2 bg-theme1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <?php dynamic_sidebar('footer1'); ?>
                        </div>
                        <div class="col-md-3">
                            <?php dynamic_sidebar('footer2'); ?>
                        </div>
                        <div class="col-md-4 offset-md-2 text-md-end">
                            <?php dynamic_sidebar('footer3'); ?>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-9">
                            <div class="copyright">
                                <?php the_field('copyright', 'option'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php require get_template_directory() . '/snippets/social-icons.php'; ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>