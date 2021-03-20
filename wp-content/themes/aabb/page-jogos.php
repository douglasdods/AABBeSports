<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
<div id="contet-page-jogos">
    <div class="container">
        <section class="crumbs">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-single"><?php echo get_the_title(); ?></h1>
                    <div class="div-border-jogos"></div>
                </div>

            </div>
        </section>
        <section class="article content-jogos">
            <div class="row row-filtros-jogos">
                <div class="col-lg-3">
                    <select id="filtro-jogo" class="filtro-campeonatos form-control form-control-lg">
                        <option>Todas as cetegorias</option>
                         <?php
                           $terms = get_terms( array(
                                'taxonomy' => 'categoria_jogos',
                                'hide_empty' => true,
                            ) );
                            foreach ($terms as $term) {
                                echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                            }
                            
                        ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" id="nome-jogo" class="filtro-campeonatos form-control form-control-lg" placeholder="Digite o nome do campeonato que procura..." aria-label="nome do campeonato" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button id="btn-busca" class="btn btn-outline-secondary" type="button"><img src="<?php echo AABB_THEME_URI?>/img/Icons/busca.svg"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        
                        <?php
                        wp_reset_query();
                        $colunas = 0;
                        $args = array(
                            'post_type' => 'jogos',
                        );
                        $query = new WP_Query($args);

                        ?>
                        

                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post(); ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 box-jogo">
                                            <a href="<?php echo get_the_permalink();?>">
                                                <img src="<?php echo get_field('imagem_jogos', get_the_ID());?>">
                                                <div class="jogos-info">
                                                    <p><?php echo get_the_title();?></p>
                                                    
                                                </div>
                                                
                                            </a>
                                        </div>

                                    <?php }
                                }

                                ?>
                    </div>
                        
               
                </div>
            </div>
        </section>
    </div>
</div>
    <?php
}
get_footer();