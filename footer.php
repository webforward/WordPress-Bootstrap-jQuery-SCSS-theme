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
    <script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "a9f778645e0ea4d556beb9d32f2d47f76365f2ae98295ed4affa01a74f8c7ddfb939ba1f543f516b2fa0078a41fb26029e96721cd67ae3105dbbc6b13deaff4f", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.eu/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);"<div id='zsiqwidget'></div>"</script>
</body>
</html>