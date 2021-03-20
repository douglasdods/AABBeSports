<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
<div id="contet-page-contato">
    <div class="container">
        <section class="crumbs">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-single-contato"><?php echo get_the_title(); ?></h1>
                    <div class="div-border-jogos"></div>
                </div>

            </div>
        </section>
        <section class="article content-jogos">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-around">
                    	<div class="col-lg-6">
                    		<div class="box-interno-contato">
	                    		<h3 class="mensagem-contato">Mande uma mensagem</h3>
	                    		<?php echo do_shortcode('[contact-form-7 id="146" title="Formulário de contato 1"]');?>
                        	</div>
                        </div>
                        <div class="col-lg-6">
                        	<div class="box-interno-contato">
                        		<h3 class="mensagem-contato">Acesse nossas redes</h3>
                        		<div class="row row-social justify-content-center">
					    			
				    				<a href="https://www.facebook.com/aabbesports/?modal=admin_todo_tour" target="_blank">
				    					<img class="img-social" src="<?php echo AABB_THEME_URI?>/img/Icons/fb.png">
				    				</a>
				    			
				    				<a href="https://www.instagram.com/aabbesports/" target="_blank">
				    					<img class="img-social" src="<?php echo AABB_THEME_URI?>/img/Icons/instagram.png">
				    				</a>
				    			
				    				<a href="https://www.twitch.tv/aabbesports" target="_blank">
				    					<img class="img-social" src="<?php echo AABB_THEME_URI?>/img/Icons/twitch.png">
				    				</a>
				    			
				    				<a href="https://twitter.com/aabb_e" target="_blank">
				    					<img class="img-social" src="<?php echo AABB_THEME_URI?>/img/Icons/twitter.png">
				    				</a>
				    			
				    				<a href="https://www.youtube.com/channel/UCzMV5AtYS_KPEbqIOgJRSuQ?view_as=subscriber" target="_blank">
				    					<img class="img-social" src="<?php echo AABB_THEME_URI?>/img/Icons/youtube.png">
				    				</a>
					    			
					    		</div>
                        	</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
    <?php
}
get_footer();