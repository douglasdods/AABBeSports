<?php
get_header();
$user_id = get_current_user_id();
if(is_user_logged_in()){
    global $wpdb;
    $user_id = get_current_user_id();
    $tabela_campeonato_inscritos = $wpdb->prefix.'_sis__campeonatos__inscritos';
    
    //Buscar campeonatos postados
    wp_reset_query();
    $args = array(
        'post_type' => 'campeonatos',
        'posts_per_page' => -1,
        'orderby' => 'data',
        'order' => 'DESC',
    );
    $query = new WP_Query($args); 

    //buscar campeonatos que o user faz parte
    $camp_part_user= $wpdb->get_results("
        SELECT 
            campeonato_id
        FROM 
            {$tabela_campeonato_inscritos} as tci
        WHERE 
            tci.user_id = {$user_id};
    ",ARRAY_A);

    //preencher um array com os ids dos campeonatos que ele participa
    $ids_camp = array();
    foreach ($camp_part_user as $item) {
        array_push($ids_camp,$item['campeonato_id']);
    }
    ?>
    

    <div id="page-meus-campeonatos">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-sm-4">
                    <?php get_template_part( 'sidebar', 'minhaconta' ); ?>
                </div>
                <div class="col-12 col-md-8 col-sm-8 text-center">
                    <h1 class="title-page">Meus Campeonatos</h1>
                    <div class="row justify-content-between">
                        <?php
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    if(in_array(get_the_ID(), $ids_camp)){
                                        ?>
                                        <div class="card-deck col-md-6 p-3"> 
                                            <div class="card-campeonatos">
                                                <div class="box-card-img ">
                                                    <img class="card-img-top" src="<?php the_post_thumbnail_url()?>" alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo get_the_title();?></h5>
                                                    <p class="card-text">Local: <?php echo get_field('local',get_the_ID());?></p>
                                                    <p class="card-text">Data: <?php echo  date("d/m/Y H:i", strtotime(get_field('data',get_the_ID())));?></p>
                                                    <!-- <p class="card-text">Status: <?php //echo $campeonato_id;?></p> -->
                                                </div>
                                                <div class="card-footer ">
                                                    <a href="<?php echo get_the_permalink();?>">
                                                        <button class="btn btn-warning  btn-lg btn-block">Mais Detalhes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .card-encerrado *:not(button){
            background-color:#17161616;
        }
    </style>
    <?php
}
get_footer();