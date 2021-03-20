<?php
get_header();
?>

<div id="destaque-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="texto-amarelo"><img src="<?php echo AABB_THEME_URI?>/img/Icons/icon-info.svg"> A Associação Atlética do Banco do Brasil apresenta</p>
                <h1 class="titulo-destaque">Bem vindo ao nosso clube</h1>
                <p class="texto-destaque">Inscreva-se e participe das nossas competições municipais, regionais, estaduais e nacionais, presenciais e on-line de esports.</p>
                <div class="row row-btns-destaque">
                    <a class="btn-azul bnt-inscrevase-destaque" href="/registre-se/">Inscreva-se</a>
                </div>
            </div>
            <!--<div class="col-lg-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/VWX-OO_UZRo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>-->
        </div>
    </div>
</div>
<div class="container-fluid container-custom">
    <section id="jogos">
        <div class="col-titulo-jogos">
            <h1 class="titulo-jogos">Jogos</h1>
            <div class="div-border-jogos"></div>
        </div>
        <!--<div class="col-texto-jogos">
            <p class="texto-jogos">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in venenatis dolor. Phasellus metus ipsum, aliquet ut volutpat elementum, cursus ac risus. Pellentesque id turpis eu sapien rhoncus convallis et sed mi.</p>
        </div>-->
        <div class="row justify-content-md-center">
            <div class="col-md-11">

                <div class="row center">



            <?php

            $args = array(
                    'post_type' => 'jogos',
                    
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(); 

            ?>


                        <div class="coluna-jogos">
                            <div class="img-jogo">
                                <figure>
                                    <a class="link-img-jogo" href="<?php echo get_the_permalink();?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>">
                                    </a>
                                </figure>
                            </div>

                            <?php /*
                            <div class="texto-jogo">
                                <h3 class="titulo-jogo"><?php the_title();?></h3>
                                <p class="resumo-jogo"><?php echo get_the_excerpt();?></p>
                                <a class="botao-jogo" href="<?php echo get_the_permalink();?>">Ver</a>
                            </div>
                            */ ?>



                        </div>


            <?php
                }
            }
            ?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-btn-todos-jogos">
                <a class="btn-todos-jogos" href="/jogos">Ver todos</a>
            </div>
        </div>
    </section>
</div>
<section id="campeonatos">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-12 col-titulo-campeonatos">
                    <h3 class="titulo-proximos-campeonatos">Próximos Campeonatos</h3>
                    <div class="div-border-campeonatos"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-campeonatos justify-content-center">
            <div class="col-lg-10 box-campeonatos">
                
                <?php
                wp_reset_query();
                $posts_per_page = 5;
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
		                            <!--<th scope="col">Data</th>-->
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
			                                    <!--<td><?php // echo date("d/m/Y H:i", strtotime(get_field('data',get_the_ID())));?></td>-->
			                                    <td><?php echo $categoria;?></td>
			                                    <td class="col-inscrevase"><a class="bnt-inscrevase-campeonato" href="<?php echo get_the_permalink();?>">Acesse</a></td>
			                                </tr>



			                                <?php
			                            }
			                        }

		                        ?>
	                        </tbody>
	                    </table>
	                    
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-ver-todos-tabela">
        	<div class="box-links-paginacao">
        		<a class="btn-azul bnt-inscrevase-destaque" href="#">Ver todos</a>
        	</div>
        </div>
    </div>
</section>
<section id="parceiros">
    <div class="container-fluid">

    	<div class="col-titulo-jogos">
            <h1 class="titulo-jogos">Parceiros</h1>
            <div class="div-border-parceiros"></div>
        </div>
        <!--
        <div class="row justify-content-center center-2">
            
            <div class="col-md-3 bloco-publicidade">
            	<div class="embed-responsive embed-responsive-16by9">
            		<iframe src="https://www.youtube.com/embed/sVYd7JuRjcI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                
            </div>
        
            
            <div class="col-md-3 bloco-publicidade">
            	<div class="embed-responsive embed-responsive-16by9">
            		<iframe src="https://www.youtube.com/embed/zu0EGbd8N_E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        
            
            <div class="col-md-3 bloco-publicidade">
            	<div class="embed-responsive embed-responsive-16by9">
            		<iframe src="https://www.youtube.com/embed/RGLq4fK_DKE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-3 bloco-publicidade">
            	<div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/sVYd7JuRjcI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                
            </div>
        </div>
    	-->
    	<!--<div class="row justify-content-center center-2">-->
        <div class="row justify-content-around"> 
            <div class="col-md-2 bloco-publicidade">
        	    <img class="img-parceiros" src="<?php echo AABB_THEME_URI?>/img/fenab.png">           
            </div>
            <div class="col-md-2 bloco-publicidade">
            	<img class="img-parceiros" src="<?php echo AABB_THEME_URI?>/img/aabb-banco.png">
            </div>
            <div class="col-md-2 bloco-publicidade">
            	<img class="img-parceiros" src="<?php echo AABB_THEME_URI?>/img/bb-seguros.png">
            </div>
        </div>

    </div>
</section>

<?php
get_footer();
