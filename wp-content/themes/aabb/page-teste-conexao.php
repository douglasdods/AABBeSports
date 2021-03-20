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
        <section class="article content-jogos">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        
                        
                        

                               
                    </div>
                        
               
                </div>
            </div>
        </section>
    </div>
    <?php
}
get_footer();