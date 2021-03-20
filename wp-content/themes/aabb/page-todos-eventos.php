<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
    <div class="container-fluid container-page">
        <section class="crumbs">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-single"><?php echo get_the_title(); ?></h1>
                </div>

            </div>
        </section>
        <section class="article content-todos-eventos">
            <div class="row">
                <?php
            wp_reset_query();
            $args = array(
                'post_type' => 'post',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    ?>
                    <div class="col-md-3">
                        <div class="box-evento">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="img-evento">
                                    <img src="<?php the_post_thumbnail_url(); ?>">
                                </div>
                            </a>
                            <div class="titulo-evento">
                                <a class="bnt-ver-evento" href="<?php echo get_the_permalink(); ?>">
                                    
                                    <h3><?php echo get_the_title(); ?></h3>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
                
            </div>
        </section>
    </div>
    <?php
}
get_footer();