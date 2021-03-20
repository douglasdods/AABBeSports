<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
<div id="content-page-campeonatos">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 col-titulo-campeonatos">
                    <h3 class="titulo-proximos-campeonatos">Próximos Campeonatos</h3>
                    <div class="div-border-campeonatos"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-campeonatos justify-content-center">
            <div class="col-lg-12 box-campeonatos">
                <div class="row">
                    <div class="col-12">
                    
                        <div class="row row-filtros-campeonatos">
                            <div class="col-lg-3">
                                <select id="filtro-campeonato-jogos" class="filtro-campeonatos form-control form-control-lg">
                                    <option>Todos os jogos</option>
                                     <?php
                                        wp_reset_query();
                                        $args = array(
                                            'post_type' => 'jogos',
                                            'post_status' => 'publish',
                                        );
                                        $query = new WP_Query($args);
                                        if ($query->have_posts()) {
                                             while ($query->have_posts()) {
                                                 $query->the_post();
                                                 echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';
                                             }
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select id="filtro-campeonato-capetoria" class="filtro-campeonatos form-control form-control-lg">
                                    <option>Todas as cetegorias</option>
                                     <?php
                                       $terms = get_terms( array(
                                            'taxonomy' => 'categoria_camp',
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
                                    <input type="text" id="nome-campeonato" class="filtro-campeonatos form-control form-control-lg" placeholder="Digite o nome do campeonato que procura..." aria-label="nome do campeonato" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button id="btn-busca" class="btn btn-outline-secondary" type="button"><img src="<?php echo AABB_THEME_URI?>/img/Icons/busca.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_query();
                $posts_per_page = 10;
                $args = array(
                    'post_type' => 'campeonatos',
                    'posts_per_page' => $posts_per_page,
                    /*'meta_query' => array(
                        array(
                            'key' => 'data',
                            'value' => date('Y-m-d H:i:s'),
                            'type' => 'data',
                            'compare' => '>'
                        ),
                    ),*/
                    'orderby' => 'data',
                    'order' => 'ASC',
                );
                $query = new WP_Query($args); 
                $count = $query->found_posts;
                
                ?>
                <div class="row">
                    <div class="table-campeonatos col-12 table-responsive-lg">
                        <table class="table table-light">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Campeonato</th>
                                    <th scope="col">Organizador</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();



                                            $categoria = '';
                                            $terms = get_the_terms( $post->ID , 'categoria_camp' );
                                            if ( $terms != null ){
                                                foreach( $terms as $term ) {
                                                    $categoria = $term->name;
                                                }

                                            }

                                            ?>


                                            <tr>
                                                <td><?php echo get_the_title();?></th>
                                                <td><?php echo get_the_title();?></th>
                                                <td><?php echo get_field('local',get_the_ID());?></td>
                                                <td><?php echo date("d/m/Y H:i", strtotime(get_field('data',get_the_ID())));?></td>
                                                <td><?php echo $categoria;?></td>
                                                <td class="col-inscrevase"><a class="bnt-inscrevase-campeonato" href="<?php echo get_the_permalink();?>">Acesse</a></td>
                                            </tr>



                                            <?php
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                        <div class="row row-paginacao-tabela">
                            <div class="box-links-paginacao">
                                <?php 
                                    $max_pages = $count / $posts_per_page;
                                    $resto = $count % $posts_per_page;
                                    if ($resto > 0) {
                                        $max_pages = intval($max_pages) + 1;
                                    }else{
                                        $max_pages = intval($max_pages);
                                    }
                                    for ($i=1; $i <=$max_pages ; $i++) { 
                                ?>
                                        <a href="javascript:void(0);" class="link-paginacao <?php echo $i == 1 ? 'current': '';?>"><?= $i?></a>     
                                <?php
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
}
get_footer();