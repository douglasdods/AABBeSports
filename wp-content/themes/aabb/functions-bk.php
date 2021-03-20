<?php

define('AABB_THEME_PATH', get_template_directory());
define('AABB_THEME_URI', get_template_directory_uri());

register_nav_menus(
    array(
        'primary-menu' => __( 'Left Menu' ),
        'secondary-menu' => __( 'Right Menu' )
    )
);

function wpdocs_aabb_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'style-css', AABB_THEME_URI.'/style.css' );
    wp_enqueue_style( 'slick-css', AABB_THEME_URI.'/slick/slick.css' );
    wp_enqueue_style( 'slick-theme-css', AABB_THEME_URI.'/slick/slick-theme.css' );
    wp_enqueue_script( 'bootstrap-js1', 'https://code.jquery.com/jquery-3.4.1.min.js' );
    wp_enqueue_script( 'bootstrap-js2', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' );
    wp_enqueue_script( 'bootstrap-js3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' );
    wp_enqueue_script( 'admin-datatables', 'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js' );
    wp_enqueue_script( 'bootstrap-admin-datatables', 'https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js' );

    wp_enqueue_script( 'slick-js', AABB_THEME_URI.'/slick/slick.min.js' );
    wp_enqueue_script( 'custom-js', AABB_THEME_URI.'/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_aabb_scripts' );

add_theme_support( 'post-thumbnails' );

function register_user_campeonato(){
    global $wpdb;
    $user_id = $_REQUEST['user_id'];
    $campeonato_id = $_REQUEST['campeonato_id'];
    $today = date("Y-m-d H:i:s");
    $id_jogo = $_REQUEST['id_jogo'];
    $nome_equipe = $_REQUEST['nome_equipe'];
    $response = $wpdb->insert($wpdb->prefix.'_sis__campeonatos__inscritos', array(
        'user_id' => $user_id,
        'time_id' => $user_id,
        'campeonato_id' => $campeonato_id,
        'user_jogo_nickname' => $id_jogo,
        'usuario_data_inscricao' => $today,
        'usuario_inscricao_status' => 'Pendente',
    ));
    wp_send_json($response);
}

add_action('wp_ajax_register_user_campeonato', 'register_user_campeonato');

function lista_inscritos_campeonatos(){
    add_menu_page('Inscritos nos Campeonatos', 'Inscritos nos campeonatos', 'manage_options', 'inscritos-campeonatos', 'lista_inscritos');

}
add_action('admin_menu', 'lista_inscritos_campeonatos');

function lista_inscritos(){
    include 'lista-inscritos.php';

}
function register_script_admin( $hook ) {
    if ( 'toplevel_page_inscritos-campeonatos' == $hook ) {
        wp_enqueue_style( 'bootstrap-admin-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
        wp_enqueue_script( 'bootstrap-admin-js1', 'https://code.jquery.com/jquery-3.4.1.js' );
        wp_enqueue_script( 'admin-datatables', 'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js' );
        wp_enqueue_script( 'bootstrap-admin-datatables', 'https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js' );
        wp_enqueue_script( 'admin-custom-js', AABB_THEME_URI.'/admin-custom.js' );

    }
}
add_action( 'admin_enqueue_scripts', 'register_script_admin' );


function lista_campeonatos_usuarios(){
    global $wpdb;
    $current_user_id = get_current_user_id();
    $sql = "SELECT campeonato_id FROM wp_sa32p_user_campeonato WHERE user_id = {$current_user_id}";
    $results = $wpdb->get_results($sql, ARRAY_A); 
    $user_data = get_userdata($current_user_id);
    $class_mydb = new wpdb ( 'st_user_aabb', 'YFrDVCtcwAAz3nc', 'st_torneios', '50.62.161.72' ); 
    $class_mydb -> show_errors();
    $class_rows = $class_mydb -> get_results( "SELECT senha FROM usuarios WHERE email = '".$user_data->user_email."'", ARRAY_A );
    if (!empty($class_rows)) {
        $url ='http://torneios.aabbesports.com.br/login.php?username='.$user_data->user_email.'&password='.base64_encode($class_rows[0]['senha']);
    }else{
        $url ='http://torneios.aabbesports.com.br/';
    }
    ?>

                        <div class="table-campeonatos-user table-responsive-lg">
                            <table id="table-jogos-campeonatos" class="table table-light">
                                <thead>
                                <tr>
                                    <th scope="col">Campeonato</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Plataforma</th>
                                    <th scope="col"></th>
                                    <th scope="col">Resultados</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $result) { ?>
                                        <tr>
                                            <td><?php echo get_the_title($result['campeonato_id']);?></th>
                                            <td><?php echo get_field('local',$result['campeonato_id']);?></td>
                                            <td><?php echo date("d/m/Y H:i", strtotime(get_field('data',$result['campeonato_id'])));?></td>
                                            <td><?php echo get_field('plataforma',$result['campeonato_id']);?></td>
                                            <td><a class="bnt-inscrevase-campeonato" href="<?php echo get_the_permalink($result['campeonato_id']);?>">Ver</a></td>
                                            <td><a class="bnt-inscrevase-campeonato" href="<?php echo $url?>" target="_blank">Resultados</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Campeonato</th>
                                        <th scope="col">Local</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Plataforma</th>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
<?php
}
add_shortcode('lista_campeonatos_usuarios', 'lista_campeonatos_usuarios');

function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/style.css"/>';
}
add_action('login_head', 'custom_login_css');

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

 function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function integracaoSeuTorneio(){

    $class_mydb = new wpdb ( 'st_user_aabb', 'YFrDVCtcwAAz3nc', 'st_torneios', '50.62.161.72' ); 
    $class_mydb -> show_errors();
    do{
        $verificador = generateRandomString();
        $class_rows = $class_mydb -> get_results( "SELECT * FROM usuarios WHERE verificador = '".$verificador."'" ); 

    }while(!empty($class_rows));
     
    $dados = array(
        'nome' => 'Teste Integração',
        'psn' => 'teste',
        'cpf' => '',
        'senha' => '123456',
        'email' => 'testeintegracao@teste.com',
        'verificador' => $verificador,
        'cidade' => 'Caratinga',
        'estado' => '',
        'telefone' => '',
        'provedor' => '',
        'velocidade' => '',
        'horario' => '',
        'slogan' => '',
        'console' => '',
        'plano_pagamento' => 1,
        'data_pagamento' => date('d/m/Y'),
        'data_fim' => date('d/m/Y', strtotime('+15 days')),
    );
    $table = 'usuarios';
    $class_mydb->insert($table,$dados);
    $my_id = $wpdb->insert_id;
                        

}

add_action( 'login_enqueue_scripts', 'enqueue_my_script' );

function enqueue_my_script( $page ) {
    wp_enqueue_script( 'bootstrap-admin-js1', 'https://code.jquery.com/jquery-3.4.1.js' );
    wp_enqueue_script( 'custom-login-js', AABB_THEME_URI.'/custom-login.js', null, null, true );
}



/* Funçao para criar um time */
function criaNovoTime(){
    global $_POST,$_FILES,$wpdb;
    $table_name = $wpdb->prefix . '_sis__time';
    if ($wpdb->get_var("SHOW TABLES LIKE '". $table_name ."'"  ) != $table_name ) {
        $sql  = 
        "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}_sis__time (
            `ID` BIGINT(20) NOT NULL AUTO_INCREMENT,
            `time_nome` VARCHAR(45) NOT NULL,
            `time_descricao` TEXT NULL,
            `user_create_id` BIGINT(20) NULL,
            `user_id_capitao` BIGINT(20) NOT NULL,
            `time_imagem` VARCHAR(250),
            `time_status` => ENUM('Ativo','Inativo'),
            `time_data_criacao` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
            `time_data_edicao` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`ID`),
            UNIQUE INDEX `time_nome_UNIQUE` (`time_nome` ASC))
        ";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . '_sis__times_membros';
    if ($wpdb->get_var("SHOW TABLES LIKE '". $table_name ."'"  ) != $table_name ) {
        $sql2 = "
        CREATE TABLE IF NOT EXISTS {$wpdb->prefix}_sis__times_membros (
          `ID` BIGINT(20) NOT NULL AUTO_INCREMENT,
          `user_id` BIGINT(20) NOT NULL,
          `time_id` BIGINT(20) NOT NULL,
          `time_convite_data` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
          `time_inscricao_status` ENUM('Confirmado', 'Rejeitado', 'Pendente','Removido','Desvinculou-se') NOT NULL DEFAULT 'Pendente',
          `time_convite_alteracao_status` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`ID`),
          UNIQUE INDEX `user_time_UNIQUE` (`time_id`,`user_id`),
          INDEX `membro_time_primary_key_idx` (`time_id` ASC),
          CONSTRAINT `membro_time_primary_key`
            FOREIGN KEY (`time_id`)
            REFERENCES {$wpdb->prefix}_sis__time (`ID`)
            ON DELETE RESTRICT
            ON UPDATE CASCADE
        )
        ";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql2);
    }

    if(isset($_POST['time_nome']) && !empty($_POST['time_nome'])){
        $dados = $_POST;
        $user_id = get_current_user_id();
        $table = $wpdb->prefix.'_sis__time';  
        $time_nome_permitido = $wpdb->get_results("SELECT time_nome FROM {$table} WHERE time_nome = '{$_POST['time_nome']}' LIMIT 1",ARRAY_A);
        if(!empty($time_nome_permitido)) {
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Já existe um time com este nome',
                    'data' => $_POST
                )
            ); 
        }
        if($_FILES['time_imagem']['size'] > 0  && !empty($_FILES['time_imagem']['tmp_name'])){
            $wordpress_upload_dir = wp_upload_dir(); 
            $time_img = $_FILES['time_imagem'];
            $new_file_path = $wordpress_upload_dir['path'] . '/' . $time_img['name'];
            $new_file_mime = mime_content_type( $time_img['tmp_name'] );
             
            if( $time_img['error'] ){
                 wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível realizar o upload da imagem do  time',
                        'data' => $time_img['error']
                    )
                ); 
            }
            if( $time_img['size'] > wp_max_upload_size() ){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'A imagem é muito grande, tente realizar o upload de uma imagem menor',
                        'data' => $time_img['error']
                    )
                ); 
            }
            if( move_uploaded_file( $time_img['tmp_name'], $new_file_path ) ) { 
                $upload_id = wp_insert_attachment( array(
                    'guid'           => $new_file_path, 
                    'post_mime_type' => $new_file_mime,
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', $time_img['name'] ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                ), $new_file_path );
             
                wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            }

        }
        $args  = array(
            'time_nome' => $dados['time_nome'],
            'time_descricao' => $dados['time_descricao'],
            'user_id_capitao' => $user_id,
            'user_create_id' => $user_id
        );
        if(isset($upload_id) && !empty($upload_id)){
            $args['time_imagem'] = $upload_id;
        }
        $novoTime = $wpdb->insert($table,$args);
        if($novoTime){
            $table_membros = $wpdb->prefix.'_sis__times_membros';
            $membros = $_POST['time_participantes'];
             $args  = array(
                'time_nome' => $dados['time_nome'],
                'time_descricao' => $dados['time_descricao'],
                'user_id_capitao' => $user_id,
                'user_create_id' => $user_id
            );
            $time_id = $wpdb->insert_id;
            $args_members = array(
                'user_id' => $user_id,
                'time_id' => $time_id,
                'time_inscricao_status' => 'Confirmado'
            );
            $insert_member = $wpdb->insert($table_membros,$args_members);
            if(!$insert_member){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível inserir os membros',
                        'data' => $args_members
                    )
                );        
            }
            $erros = array();
            $nao_criados = "";
            foreach ($membros as $key => $value) {
                $user_insert = get_user_by('email',$value);
                $args_members = array(
                    'user_id' => intval($user_insert->data->ID),
                    'time_id' => $time_id,
                );
                $insert_member = $wpdb->insert($table_membros,$args_members);
                if(!$insert_member){
                    array_push($erros,
                        array(
                            'error' => true,
                            'mensagem' => 'Não foi possível inserir alguns membros membros',
                            'data' => array($args_members,$user_insert,$wpdb->last_error)
                        )
                    );        
                    $nao_criados .= "" . $user_insert->data->user_email . " ";
                }
            }
            if(!empty($erros)){
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Time criado com sucesso, porém os seguintes usuários não puderam ser vinculados ao time:'.$nao_criados,
                        'data'=> $erros
                    )
                );    
            }
            wp_send_json(
                array(
                    'error' => false,
                    'mensagem' => 'Time criado com sucesso'
                )
            );
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível criar um time, por favor tente novamente"
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => 'Não foi possível criar o seu time'
        )
    );
}
add_action('wp_ajax_NovoTime','criaNovoTime',10);

function buscaTime(){
    global $_POST,$wpdb;
    if(isset($_POST['time_id']) && !empty($_POST['time_id'])){
        $time_id = $_POST['time_id'];
        $r = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}_sis__time WHERE ID={$time_id}",ARRAY_A);
        $r[0]['time_imagem'] = wp_get_attachment_url($r[0]['time_imagem'] );
        if(!empty($r)){
            $r_membros = $wpdb->get_results("
                SELECT 
                    m.ID as id,
                    m.time_id as time_id,
                    u.ID as user_id,
                    u.display_name as display_name,
                    m.time_inscricao_status as time_inscricao_status
                FROM 
                    {$wpdb->prefix}_sis__times_membros as m 
                INNER JOIN 
                    {$wpdb->prefix}users as u  
                ON 
                    u.id = m.user_id  
                WHERE 
                    time_id={$time_id}
                AND 
                    time_inscricao_status IN ('Pendente','Confirmado')
            ");
            $r['time_participantes'] = $r_membros;
            wp_send_json(
                array(
                    'error' => false,
                    'mensagem' => 'Time encontrado',
                    'data' => $r
                )
            );
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível localizar o time, por favor tente novamente",
                    'data' => ''
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => "Não foi possível localizar o time, por favor tente novamente",
            'data' => ''
        )
    );
}
add_action('wp_ajax_BuscaTime','buscaTime',10);

function AtualizaTime(){
    global $_POST,$wpdb,$_FILES;
    if(isset($_POST['time_nome']) && !empty($_POST['time_nome']) && !empty($_POST['time_id'])){
    	$user_id = get_current_user_id();
        $table = $wpdb->prefix.'_sis__time';
    	$time_user_id_capitao = $wpdb->get_results("SELECT user_id_capitao FROM {$table} WHERE ID = {$_POST['time_id']}", ARRAY_A);
    	if(empty($time_user_id_capitao) || ($user_id != $time_user_id_capitao[0]['user_id_capitao'])){
			wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Somente o capitão pode atualizar o time',
                    'data' => ''
                )
            ); 
    	}
        if($_FILES['time_imagem']['size'] > 0  && !empty($_FILES['time_imagem']['tmp_name'])){
            $wordpress_upload_dir = wp_upload_dir(); 
            $time_img = $_FILES['time_imagem'];
            $new_file_path = $wordpress_upload_dir['path'] . '/' . $time_img['name'];
            $new_file_mime = mime_content_type( $time_img['tmp_name'] );
             
            if( $time_img['error'] ){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível realizar o upload da imagem do  time',
                        'data' => $time_img['error']
                    )
                ); 
            }
            if( $time_img['size'] > wp_max_upload_size() ){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'A imagem é muito grande, tente realizar o upload de uma imagem menor',
                        'data' => $time_img['error']
                    )
                ); 
            }
            if( move_uploaded_file( $time_img['tmp_name'], $new_file_path ) ) { 
                $upload_id = wp_insert_attachment( array(
                    'guid'           => $new_file_path, 
                    'post_mime_type' => $new_file_mime,
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', $time_img['name'] ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                ), $new_file_path );
             
                wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            }

        }
        $dados = $_POST;
        $where  =array(
            'ID' => $_POST['time_id']
        );

        $args  = array(
            'time_nome' => $dados['time_nome'],
            'time_descricao' => $dados['time_descricao'],
            'user_id_capitao' => $user_id,
            'time_data_edicao' => date('Y-m-d H:i:s')
        );
        if(isset($upload_id) && !empty($upload_id)){
            $args['time_imagem'] = $upload_id;
        }
        $erros = array();
        $nao_criados = "";
        $atualizaTime = $wpdb->update($table,$args,$where);
        if($atualizaTime){
            $table_membros = $wpdb->prefix.'_sis__times_membros';
            $membros = $_POST['time_participantes'];
            foreach ($membros as $key => $value) {
                $user_insert = get_user_by('email',$value);
                $args_members = array(
                    'user_id' => $user_insert->data->ID,
                    'time_id' => $_POST['time_id'],
                );
                $insert_member = $wpdb->insert($table_membros,$args_members);
                if(!$insert_member){
                	$time_inscricao_status =  ($args_members['user_id'] == $user_id) ?  "Confirmado" : "Pendente";
                    $status = array(                 
                        'time_inscricao_status' => $time_inscricao_status,
                        'time_convite_alteracao_status' => date('Y-m-d H:i:s')
                    );
                    $update_member = $wpdb->update($table_membros,$status,$args_members);
                    if(!$update_member){
                        array_push($erros,
                            array(
                                'error' => true,
                                'mensagem' => 'Não foi possível inserir alguns membros membros',
                                'data' => array($args_members,$user_insert,$wpdb->last_error)
                            )
                        );        
                        $nao_criados .= "" . $user_insert->data->user_email . " ";
                    }
                }
            }
            if(!empty($erros)){
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Time atualizado com sucesso, porém os seguintes usuários não puderam ser vinculados ao time:'.$nao_criados,
                        'data'=> $erros
                    )
                );    
            }
            wp_send_json(
                array(
                    'error' => false,
                    'mensagem' => 'Time atualizado com sucesso'
                )
            );
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível atualizat o time, por favor tente novamente"
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => 'Não foi possível atualizar o seu time'
        )
    );
}
add_action('wp_ajax_AtualizaTime','atualizaTime',10);

function removeMembro(){
    global $_POST,$wpdb;
    if(isset($_POST['time_id']) && !empty($_POST['time_id']) && !empty($_POST['user_id']) && !empty($_POST['id'])){
        $dados = $_POST;
        $user_id = get_current_user_id();
        $table = $wpdb->prefix.'_sis__time';
    	$time_user_id_capitao = $wpdb->get_results("SELECT user_id_capitao FROM {$table} WHERE ID = {$_POST['time_id']}", ARRAY_A);
    	if(empty($time_user_id_capitao) || ($user_id != $time_user_id_capitao[0]['user_id_capitao'])){
			wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Somente o capitão pode remover membros do time',
                    'data' => ''
                )
            ); 
    	}
        $atualizaTime = $wpdb->get_row("SELECT * FROM {$table} WHERE ID = {$_POST['time_id']} AND user_id_capitao = {$user_id}");
        if($atualizaTime){
            $table_membros = $wpdb->prefix.'_sis__times_membros';
            $status = array(
                'time_inscricao_status' => "Removido",
                'time_convite_alteracao_status' => date('Y-m-d H:i:s')
            );
            $args_members = array(
                'user_id' => $_POST['user_id'],
                'time_id' => $_POST['time_id'],
                'ID' => $_POST['id'],
            );
            $removeMembro = $wpdb->update($table_membros,$status,$args_members);
            if(!$removeMembro){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível remover o membro',
                        'data' => $args_members
                    )
                );        
            }else{
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Mmebro removido com sucesso'
                    )
                );
            }
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível atualizar o time, por favor tente novamente"
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => 'Não foi possível remover o membro do time'
        )
    );
}
add_action('wp_ajax_removeMembro','removeMembro',10);


function excluirTime(){
    global $_POST,$wpdb;
    if(isset($_POST['time_id']) && !empty($_POST['time_id'])){
        $dados = $_POST;
        $user_id = get_current_user_id();
        $table = $wpdb->prefix.'_sis__time';
        $time_user_id_capitao = $wpdb->get_results("SELECT user_id_capitao FROM {$table} WHERE ID = {$_POST['time_id']}", ARRAY_A);
        if(empty($time_user_id_capitao) || ($user_id != $time_user_id_capitao[0]['user_id_capitao'])){
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Somente o capitão pode remover excluir o time',
                    'data' => ''
                )
            ); 
        }
        $table = $wpdb->prefix.'_sis__times_membros';
        $sql = "SELECT * FROM {$table} WHERE time_id = {$_POST['time_id']} AND  time_inscricao_status = 'Confirmado' and user_id != {$user_id}";
        $membrosNoTime = $wpdb->get_row($sql);
        if(empty($membrosNoTime)){
            $table_time = $wpdb->prefix.'_sis__time';
            $status = array(
                'time_status' => "Inativo",
                'time_data_edicao' => date('Y-m-d H:i:s')
            );
            $args_members = array(
                'ID' => $_POST['time_id'],
                'user_id_capitao' => $user_id
            );
            $inativaTime = $wpdb->update($table_time,$status,$args_members);
            if(!$inativaTime){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível excluir o time',
                        'data' => $args_members
                    )
                );        
            }else{
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Time excluído com sucesso'
                    )
                );
            }
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível excluir o time, por favor tente novamente"
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => 'Não foi possível excluir o time'
        )
    );
}
add_action('wp_ajax_excluirTime','excluirTime',10);


function sairDoTime(){
    global $_POST,$wpdb;
    if(isset($_POST['time_id']) && !empty($_POST['time_id']) && !empty($_POST['user_id']) && !empty($_POST['id'])){
        $dados = $_POST;
        $user_id = get_current_user_id();
        $table = $wpdb->prefix.'_sis__times_membros';
        $sql = "SELECT * FROM {$table} WHERE time_id = {$_POST['time_id']} AND user_id = {$user_id} AND time_inscricao_status = 'Confirmado'";
        $atualizaTime = $wpdb->get_row($sql);
        if($atualizaTime){
            $table_membros = $wpdb->prefix.'_sis__times_membros';
            $status = array(
                'time_inscricao_status' => "Desvinculou-se",
                'time_convite_alteracao_status' => date('Y-m-d H:i:s')
            );
            $args_members = array(
                'user_id' => $_POST['user_id'],
                'time_id' => $_POST['time_id'],
                'ID' => $_POST['id'],
            );
            $removeMembro = $wpdb->update($table_membros,$status,$args_members);
            if(!$removeMembro){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível sair do time',
                        'data' => $args_members
                    )
                );        
            }else{
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Removido do time com sucesso'
                    )
                );
            }
        }else{
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => "Não foi possível sair do time, por favor tente novamente",
                    'data' => $sql
                )
            );
        }
    }
    wp_send_json(
        array(
            'error' => true,
            'mensagem' => 'Não foi possível sair do time'
        )
    );
}
add_action('wp_ajax_sairDoTime','sairDoTime',10);

function aceitaConvite(){
	global $wpdb,$_POST;
	if(!empty($_POST['time_id']) && !empty($_POST['user_id']) ){
		$time_id = $_POST['time_id'];
		$user_id = $_POST['user_id'];
		$user_logged_id = get_current_user_id();
		$table = $wpdb->prefix.'_sis__times_membros';
    	$time_convite = $wpdb->get_results("SELECT * FROM {$table} WHERE time_id = {$time_id} AND user_id = {$user_id}", ARRAY_A);
    	if(empty($time_convite) || ($user_logged_id != $time_convite[0]['user_id']) || ($user_logged_id != $user_id) ){
			wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Você não pode aceitar um convite para esse time',
                    'data' => ''
                )
            ); 
    	}else{
            $status = array(
                'time_inscricao_status' => "Confirmado",
                'time_convite_alteracao_status' => date('Y-m-d H:i:s')
            );
            $args_members = array(
                'user_id' => $user_id,
                'time_id' => $time_id,
                'ID' => $time_convite[0]['ID'],
            );
            $aceitaConvite = $wpdb->update($table,$status,$args_members);
            if(!$aceitaConvite){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível confirmar o convite',
                        'data' => $args_members
                    )
                );        
            }else{
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Convite aceito com sucesso'
                    )
                );
            }
    	}

	}
}
add_action('wp_ajax_aceitaConvite','aceitaConvite',10,2);

function rejeitaConvite(){
	global $wpdb,$_POST;
	if(!empty($_POST['time_id']) && !empty($_POST['user_id']) ){
		$time_id = $_POST['time_id'];
		$user_id = $_POST['user_id'];
		$user_logged_id = get_current_user_id();
		$table = $wpdb->prefix.'_sis__times_membros';
    	$time_convite = $wpdb->get_results("SELECT * FROM {$table} WHERE time_id = {$time_id} AND user_id = {$user_id}", ARRAY_A);
    	if(empty($time_convite) || ($user_logged_id != $time_convite[0]['user_id']) || ($user_logged_id != $user_id) ){
			wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Você não pode rejeitar um convite para esse time',
                    'data' => ''
                )
            ); 
    	}else{
            $status = array(
                'time_inscricao_status' => "Rejeitado",
                'time_convite_alteracao_status' => date('Y-m-d H:i:s')
            );
            $args_members = array(
                'user_id' => $user_id,
                'time_id' => $time_id,
                'ID' => $time_convite[0]['ID'],
            );
            $aceitaConvite = $wpdb->update($table,$status,$args_members);
            if(!$aceitaConvite){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível rejeitar o convite',
                        'data' => $args_members
                    )
                );        
            }else{
                wp_send_json(
                    array(
                        'error' => false,
                        'mensagem' => 'Convite rejeitado com sucesso'
                    )
                );
            }
    	}

	}
}
add_action('wp_ajax_rejeitaConvite','rejeitaConvite',10,2);

function data_fetch(){
    $user_id = get_current_user_id();
    $blogusers = get_users( array( 'fields' => array( 'user_email','ID' ),'search' => $_POST['s'] ));
    //$blogusers = get_users( array( 'search' => $_POST['s'] ) );
    // Array of WP_User objects.
    foreach ( $blogusers as $user ) {
        if($user->ID != $user_id && $user->user_email == $_POST['s'])
            echo '<h6 class="busca"><span onclick="acoes($(this))">' . esc_html( $user->user_email ) . '</span></h6>';
    }
    die();
}
add_action('wp_ajax_search_name' , 'data_fetch');

function custom_register_user(){
    $userdata = array(
        'user_login' =>  $_REQUEST['username'],
        'user_email'   =>  $_REQUEST['user_email'],
        'user_pass'  =>  $_REQUEST['user_pass'],
        'display_name' => $_REQUEST['display_name'],
        'role' => 'subscriber'
    );
    $user_id = wp_insert_user( $userdata ) ;
    
    // On success.
    if ( ! is_wp_error( $user_id ) ) {
        $nome = explode(" ", $_REQUEST['display_name']);
        update_user_meta($user_id, 'first_name', $nome[0]);
        /*update_user_meta($user_id, 'user_cpf', $_REQUEST['user_cpf']);
        update_user_meta($user_id, 'user_data_nascimento', $_REQUEST['user_data_nascimento']);
        update_user_meta($user_id, 'sexo_user', $_REQUEST['sexo']);
        update_user_meta($user_id, 'cidade', $_REQUEST['cidade']);
        update_user_meta($user_id, 'user_estado', $_REQUEST['user_estado']);*/
        update_user_meta($user_id, 'user_telefone', $_REQUEST['user_telefone']);
        
        $creds = array(
            'user_login'    => $_REQUEST['user_email'],
            'user_password' => $_REQUEST['user_pass'],
            'remember'      => true
        );
        wp_signon($creds, false);
        $return = array(
            'erro' => 0,
            'mensagem' => ''

        );
        wp_send_json($return);
    }else{
        $return = array(
            'erro' => 1,
            'mensagem' => $user_id->get_error_message()

        );
        wp_send_json($return);

    }
 }
 add_action('wp_ajax_nopriv_custom_register_user', 'custom_register_user');
 add_action('wp_ajax_custom_register_user', 'custom_register_user');

 function custom_update_user(){
    
    $user_id = get_current_user_id() ;
    
    $args = array(
        'ID' =>  $user_id,
        'user_email'   =>  $_REQUEST['user_email'],
        'display_name' => $_REQUEST['display_name'],
        
    );
    $user_data = wp_update_user($args);
    // On success.
    if ( ! is_wp_error( $user_data ) ) {
        $nome = explode(" ", $_REQUEST['display_name']);
        update_user_meta($user_id, 'first_name', $nome[0]);
        update_user_meta($user_id, 'user_cpf', $_REQUEST['user_cpf']);
        update_user_meta($user_id, 'user_data_nascimento', $_REQUEST['user_data_nascimento']);
        update_user_meta($user_id, 'sexo_user', $_REQUEST['sexo']);
        update_user_meta($user_id, 'cidade', $_REQUEST['cidade']);
        update_user_meta($user_id, 'user_estado', $_REQUEST['user_estado']);
        update_user_meta($user_id, 'user_telefone', $_REQUEST['user_telefone']);
        
        $return = array(
            'erro' => 0,
            'mensagem' => ''

        );
        wp_send_json($return);
    }else{
        $return = array(
            'erro' => 1,
            'mensagem' => $user_id->get_error_message()

        );
        wp_send_json($return);

    }
 }
 add_action('wp_ajax_nopriv_custom_update_user', 'custom_update_user');
 add_action('wp_ajax_custom_update_user', 'custom_update_user');

function mostrarMembrosTimes(){
    global $wpdb;

    $time_id = $_REQUEST['time_id'];
    $campeonato_id = $_REQUEST['campeonato_id'];
    $where_novo = '';
    $r_membros = $wpdb->get_results("
        SELECT 
            *
        FROM 
            {$wpdb->prefix}_sis__campeonatos__inscritos
        WHERE 
            time_id={$time_id}
        AND 
            campeonato_id = {$campeonato_id}
    ");
    
    if (!empty($r_membros)) {
        # code...
    

    $where = "AND user_id NOT IN(";
    foreach ($r_membros as $membro) {
        
        $where .= $membro->user_id.",";
        
    }
    $where_novo = rtrim($where, ", ");

    $where_novo .= ')';
    //wp_send_json($where_novo);
    }

    $r_membros = $wpdb->get_results("
                SELECT 
                    m.ID as id,
                    m.time_id as time_id,
                    u.ID as user_id,
                    u.display_name as display_name,
                    m.time_inscricao_status as time_inscricao_status
                FROM 
                    {$wpdb->prefix}_sis__times_membros as m 
                INNER JOIN 
                    {$wpdb->prefix}users as u  
                ON 
                    u.id = m.user_id  
                WHERE 
                    time_id={$time_id}
                AND 
                    time_inscricao_status = 'Confirmado' {$where_novo}
                 
            ");

    wp_send_json($r_membros);
}
add_action('wp_ajax_mostrarMembrosTimes', 'mostrarMembrosTimes');

function mostrarMembrosTimesCampeonato(){
    global $wpdb;

    $time_id = $_REQUEST['time_id'];
    $campeonato_id = $_REQUEST['campeonato_id'];
    $r_membros = $wpdb->get_results("
        SELECT 
            *
        FROM 
            {$wpdb->prefix}_sis__campeonatos__inscritos
        WHERE 
            time_id={$time_id}
        AND 
            campeonato_id = {$campeonato_id}
    ");
    $jogadores = array();
    foreach ($r_membros as $membro) {
        $user = get_userdata($membro->user_id);
        $nome_jogador = $user->display_name;
        $jogadores[] = array(
            'nome_jogador' => $nome_jogador,
            'nickname' => $membro->user_jogo_nickname,
        );
    }
    wp_send_json($jogadores);
}
add_action('wp_ajax_mostrarMembrosTimesCampeonato', 'mostrarMembrosTimesCampeonato');

function inscreverMembrosTimes(){
    global $wpdb;

    $time_id = $_REQUEST['time_id'];
    $campeonato_id = $_REQUEST['campeonato_id'];
    $capitao_id = $_REQUEST['capitao_id'];
    $jogadores_id = $_REQUEST['jogadores'];
    $response = array();

    
    $wpdb->insert(
        $wpdb->prefix."_sis__campeonatos_times",
        array(
            'time_id' => $time_id,
            'campeonato_id' => $campeonato_id,
            'capitao_id' => $capitao_id,
        )
    );

    $id_jogador = '';
    foreach ($jogadores_id as $jogador) {
        $id_jogador = $jogador[0]['id_jogador'];
        $nickname = $jogador[0]['nickname'];
        $wpdb->insert(
            $wpdb->prefix."_sis__campeonatos__inscritos",
            array(
                'campeonato_id' => $campeonato_id,
                'time_id' => $time_id,
                'user_id' => $id_jogador,
                'user_jogo_nickname' => $nickname,

            )
        );
        if ($wpdb->insert_id == false) {
             $response = array(
                'error' => true,
                'messagem' => $wpdb->last_query
             );
             wp_send_json($wpdb->last_error);
        }
    }
    $response = array(
        'error' => false,
        'messagem' => ''
    ); 
    wp_send_json($id_jogador);
}
add_action('wp_ajax_inscreverMembrosTimes', 'inscreverMembrosTimes');


function iniciaCampeonato(){
    global $_POST,$wpdb;
    $campeonato_id = $_POST['campeonato_id'];
    $terceiro_lugar = get_post_meta($campeonato_id,'havera_disputa_de_terceiro_lugar',true);
    update_post_meta($campeonato_id,'Configuração de disputa de terceiro lugar no início do campeonato',$terceiro_lugar);    
    $chaveamento = array(2,4,8,16,32,64,128,256,512,1024);
    $fases = array('Final','Semi-Final','Quartas de Final','Oitavas de Final');
    if(empty($campeonato_id) || !intval($campeonato_id)){
        wp_send_json(
            array(
                'error' => true,
                'mensagem' => 'Campeonato não informado'
            )
        );
    }else{
        $campeonato_iniciado = get_post_meta($campeonato_id,'campeonato_iniciado',true);
        if($campeonato_iniciado){
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Campeonato já iniciado'
                )
            );  
        }
        $campeonato_data = strtotime(get_field('data',$campeonato_id));
        if(strtotime('now') -10800 < $campeonato_data){
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Data atual é menor que a data definida para o início do campeonato'
                )
            );     
        }
        $user = get_userdata(get_current_user_id());
        if(!in_array("administrator",$user->caps)) {
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Você não tem permissão para fazer isso'
                )
            );     
        }
        $sql = "
            SELECT 
                * 
            FROM 
                {$wpdb->prefix}_sis__time as tm
            INNER JOIN 
                {$wpdb->prefix}_sis__campeonatos_times as camp_time
            ON 
                tm.ID = camp_time.time_id  
            WHERE 
                camp_time.campeonato_id={$campeonato_id}
        ";
        $results = $wpdb->get_results($sql,ARRAY_A);
        $numero_times = count($results);
        $fechamento_proximo = 0;
        $quantidade_fases = 0;
        foreach ($chaveamento as $key => $value) {
            if($value == $numero_times){
                $fechamento_proximo = $value;
                $quantidade_fases = $key +1 ;
                break; 
            }elseif($value > $numero_times){
                $fechamento_proximo = $value;
                $quantidade_fases = $key + 1;
                break;
            }
        }
        $numero_jogos = $fechamento_proximo / 2;
        $times_fases = array();
        foreach ($results as $key) {
            array_push($times_fases,$key['time_id']);
        }
        shuffle($times_fases);
        $chaves = array();
        $tot = $fechamento_proximo-1;
        for ($i= 0 ; $i  < $numero_jogos ; $i++ ) { 
            array_push($chaves,array(
                'time_1' => empty($times_fases[$i]) ? 0 : $times_fases[$i],
                'time_2' => empty($times_fases[$tot]) ? 0 : $times_fases[$tot]
            ));
            $tot--;
        }
        // INSERINDO FASES NO BANCO 
        $fases = array('Final','Semi-Final','Quartas de Final','Oitavas de Final');
        $table  = $wpdb->prefix.'_sis__campeonatos_fases';
        $quantidade_jogos = 1;
        for ($i=0; $i < $quantidade_fases ; $i++) { 
            $args = array(
                'campeonato_id' => $campeonato_id,
                'nome_fase' => (isset($fases[$i])) ? $fases[$i] : ($quantidade_fases - $i) . 'º Fase',
                'ordem' => $quantidade_fases -$i,
                'status' => ($i == $quantidade_fases -1) ? 'Em progresso' :  'Não iniciado',
            );
            if($args['nome_fase'] != 'Final'){
            	$args['proxima_fase_id'] = $fase_id;
            }
            $insert = $wpdb->insert($table,$args);
            $fase_id_query = $wpdb->get_results("SELECT max(id) AS id FROM {$table}",ARRAY_A) ;
            $fase_id = $fase_id_query[0]['id'];
            if($insert){
                $table_camp  = $wpdb->prefix.'_sis__campeonatos_jogos';
                if($i == $quantidade_fases -1){
                    foreach ($chaves as $key => $value) {
                        $wo = false;
                        $wo_time = false;
                        $resultado_time_1 = '';
                        $resultado_time_2 = '';
                        if($value['time_1']== 0){
                            $wo = true;
                            $wo_time = $value['time_2'];
                            $resultado_time_1 = 0;
                            $resultado_time_2 = 3;
                        }
                        if($value['time_2'] == 0){
                            $wo = true;
                            $wo_time = $value['time_1'];
                            $resultado_time_1 = 3;
                            $resultado_time_2 = 0;
                        }
                        $args = array(
                            'numero_do_jogo' => $key + 1 ,
                            'fase_id' => $fase_id,
                            'campeonato_id' => $campeonato_id,
                            'time_1_id' => $value['time_1'],
                            'time_2_id' => $value['time_2'],
                            'resultado_time_1' => $resultado_time_1 ,
                            'resultado_time_2' => $resultado_time_2,
                            'vencedor_id' => ($wo) ? $wo_time : '',
                            'wo' => ($wo) ? 'Sim' : 'Não',
                            'resultado_status' => ($wo) ? 'Confirmado' : 'Em Aberto'
                        );
                        $insert_fase = $wpdb->insert($table_camp,$args);
                        if(!$insert_fase){
                            wp_send_json(
                                array(
                                    'error' => true,
                                    'mensagem' => $wpdb->last_error
                                )
                            );
                        }
                    }
                }else{
                    for ($nc=0; $nc < $quantidade_jogos ; $nc++) { 
                        $args = array(
                            'numero_do_jogo' => $nc + 1,
                            'fase_id' => $fase_id,
                            'campeonato_id' => $campeonato_id,
                            'wo' => 'Não',
                        );
                        $insert_fase = $wpdb->insert($table_camp,$args);
                        if(!$insert_fase){
                            wp_send_json(
                                array(
                                    'error' => true,
                                    'mensagem' => $wpdb->last_error
                                )
                            );
                        }
                    }
                }
                $quantidade_jogos*=2;
            }else{
                wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Erro ao gerar tabelas do campeonato'
                )
            );     
            }
        }
        update_post_meta($campeonato_id,'campeonato_iniciado',true);
        wp_send_json(array(
            'error' => false,
            'mensagem' => 'Campeonato iniciado com sucesso'
        ));
    }

}
add_action('wp_ajax_iniciaCampeonato','iniciaCampeonato',10,1);

function salvarResultadoJogos(){
    global $wpdb;
    $user_id = get_current_user_id();
    $jogo_id = $_REQUEST['jogo_id'];
    $resultadoTime1 = $_REQUEST['resultadoTime1'];
    $resultadoTime2 = $_REQUEST['resultadoTime2'];
    $time_1_id = $_REQUEST['time_1_id'];
    $time_2_id = $_REQUEST['time_2_id'];
    $campeonato_id = $_POST['campeonato_id'];

    $tabela_posts =  $wpdb->prefix.'posts';
    $author = $wpdb->get_results("SELECT post_author FROM {$tabela_posts} WHERE ID = {$campeonato_id}",ARRAY_A);


    if ($resultadoTime1 > $resultadoTime2) {
        $vencedor_id = $time_1_id;
    }elseif($resultadoTime1 < $resultadoTime2){
        $vencedor_id = $time_2_id;
    }else{
    	wp_send_json(array(
    		'error' => true,
    		'mensagem' => 'Não é permitido empate para este modelo de jogo'
    	));
        $vencedor_id = "empate";
    }

    if($user_id == $author[0]['post_author'] ){
    	$resultado_status = 'Confirmado';
    }else{
    	$resultado_status = 'Confirmacao pendente';
    }
    $postagem = $wpdb->update(
        $wpdb->prefix.'_sis__campeonatos_jogos', 
        array(
            'resultado_time_1' => $resultadoTime1,
            'resultado_time_2' => $resultadoTime2,
            'vencedor_id' => $vencedor_id,
            'resultado_status' => $resultado_status
        ),
        array(
            'ID' => $jogo_id
        )
    );
    if($postagem){
        $table = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
        $solicitacao = $wpdb->get_results("SELECT * FROM {$table}  WHERE jogo_id = {$jogo_id} and user_id={$user_id}",ARRAY_A);
        if(empty($solicitacao)){
            $data = array(
                'jogo_id' => $jogo_id,
                'user_id' => $user_id,
                'acao' => 'Postagem'
            );
            if($resultado_status == 'Confirmado'){
            	$data['acao'] =  'Confirmação';
            }
            $insert = $wpdb->insert($table,$data);
            if(!$insert){
                wp_send_json(array(
                    'error' => true,
                    'mensagem' => 'Erro ao inserir dados'
                ));
            }else{
                wp_send_json(array(
                    'error' => false,
                    'mensagem' => 'Resultado postado com sucesso, aguarde a confirmaçaõ do adversário.'
                ));
            }
        }
        wp_send_json(array(
            'error' => false,
            'mensagem' => 'Já há dados informados por esse usuário para essa partida',
            'data'=> $solicitacao
        ));
    }
    
    wp_send_json($response);
}

add_action('wp_ajax_salvarResultadoJogos', 'salvarResultadoJogos');

function ConfirmarResultadoJogo(){
    global $wpdb;
    $jogo_id = $_REQUEST['jogo_id'];
    $postagem = $wpdb->update(
        $wpdb->prefix.'_sis__campeonatos_jogos', 
        array(
            'resultado_status' => 'Confirmado'
        ),
        array(
            'ID' => $jogo_id
        )
    );
    $user_id = get_current_user_id();
    if($postagem){
        $table = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
        $solicitacao = $wpdb->get_results("SELECT * FROM {$table}  WHERE jogo_id = {$jogo_id} and user_id={$user_id}",ARRAY_A);        
        if(empty($solicitacao)){
            $data = array(
                'jogo_id' => $jogo_id,
                'user_id' => $user_id,
                'acao' => 'Confirmação'
            );
            $insert = $wpdb->insert($table,$data);
            if(!$insert){
                wp_send_json(array(
                    'error' => true,
                    'mensagem' => 'Erro ao inserir dados'
                ));
            }else{
            	$table = $wpdb->prefix.'_sis__campeonatos_jogos';
            	$fase = $wpdb->get_results("SELECT fase_id,campeonato_id,time_1_id FROM {$table}  WHERE ID = {$jogo_id}",ARRAY_A);
            	$return = apply_filters('verifica_status_fase',$fase[0]['fase_id'],$fase[0]['campeonato_id'],0,$fase[0]['time_1_id']);
                wp_send_json(array(
                    'error' => false,
                    'mensagem' => 'Resultado confirmado com sucesso'
                ));
            }
        }
        wp_send_json(array(
                    'error' => false,
                    'mensagem' => 'Já há dados informados por esse usuário para essa partida',
            		'data'=> $solicitacao
                ));
    }
    
    wp_send_json($response);
}

add_action('wp_ajax_ConfirmarResultadoJogo', 'ConfirmarResultadoJogo');

function ContestarResultadoJogo(){
    global $wpdb,$_POST,$_FILES;
    //Regras para salvar conversação
    	$tabela_mensagens = $wpdb->prefix.'_sis__campeonatos_jogos_reports';
    	if($_FILES['arquivo']['size'] > 0  && !empty($_FILES['arquivo']['tmp_name'])){
            $wordpress_upload_dir = wp_upload_dir(); 
            $arquivo = $_FILES['arquivo'];
            $new_file_path = $wordpress_upload_dir['path'] . '/' . $arquivo['name'];
            $new_file_mime = mime_content_type( $arquivo['tmp_name'] );
            if( $arquivo['error'] ){
                 wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'Não foi possível realizar o upload do arquivo',
                        'data' => $arquivo['error']
                    )
                ); 
            }
            if( $arquivo['size'] > wp_max_upload_size() ){
                wp_send_json(
                    array(
                        'error' => true,
                        'mensagem' => 'A imagem é muito grande, tente realizar o upload de uma imagem menor',
                        'data' => $arquivo['error']
                    )
                ); 
            }
            if( move_uploaded_file( $arquivo['tmp_name'], $new_file_path ) ) { 
                $upload_id = wp_insert_attachment( array(
                    'guid'           => $new_file_path, 
                    'post_mime_type' => $new_file_mime,
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', $arquivo['name'] ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                ), $new_file_path );
             
                wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            }

        }
    	$args = array(
    		'nome_solicitante' => $_POST['nome'],
    		'email' =>$_POST['email'],
    		'user_id' => get_current_user_id(),
    		'time_id' => $_POST['time_id'],
    		'fase_id' => $_POST['fase_id'],
    		'campeonato_id' => $_POST['campeonato_id'],
    		'jogo_id' => $_POST['jogo_id'],
    		'solicitacao' => $_POST['assunto'],
    		'mensagem' => $_POST['mensagem'],
    		'arquivo_id' => $upload_id,
    		'status' => 'Aberto'
    	);
    	$registro = $wpdb->insert($tabela_mensagens,$args);
    	if(!$registro){
    		wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Não foi possível registrar sua solicitação, tente novamente',
                    'data' => $wpdb->last_error,
                    'args' => $args
                )
            ); 
    	}
    // Regras para atualizaçaõ do jogo 
    $jogo_id = $_REQUEST['jogo_id'];
    $postagem = $wpdb->update(
        $wpdb->prefix.'_sis__campeonatos_jogos', 
        array(
            'resultado_status' => 'Contestado'
        ),
        array(
            'ID' => $jogo_id
        )
    );
    $user_id = get_current_user_id();
    if($postagem){
        $table = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
        $solicitacao = $wpdb->get_results("SELECT * FROM {$table}  WHERE jogo_id = {$jogo_id} and user_id={$user_id} and acao = 'Contestação'",ARRAY_A);
        if(empty($solicitacao)){
            $data = array(
                'jogo_id' => $jogo_id,
                'user_id' => $user_id,
                'acao' => 'Contestação'
            );
            $insert = $wpdb->insert($table,$data);
            if(!$insert){
                wp_send_json(array(
                    'error' => true,
                    'mensagem' => 'Erro ao inserir dados'
                ));
            }else{
                wp_send_json(array(
                    'error' => false,
                    'mensagem' => 'Solicitação de contestação realizada! Aguarde retorno'
                ));
            }
        }
        wp_send_json(array(
            'error' => false,
            'mensagem' => 'Já há dados informados por esse usuário para essa partida',
    		'data'=> $solicitacao
        ));
    }
    
    wp_send_json($response);
}

add_action('wp_ajax_ContestarResultadoJogo', 'ContestarResultadoJogo');

function finalizarContestacaoResultadoJogo(){
    global $wpdb;
    $jogo_id = $_REQUEST['jogo_id'];
    $resultadoTime1 = $_POST['resultadoTime1'];
    $resultadoTime2 = $_POST['resultadoTime2'];
    $time_1_id = $_POST['time_1_id'];
    $time_2_id = $_POST['time_2_id'];
    if ($resultadoTime1 > $resultadoTime2) {
        $vencedor_id = $time_1_id;
    }elseif($resultadoTime1 < $resultadoTime2){
        $vencedor_id = $time_2_id;
    }else{
    	wp_send_json(array(
    		'error' => true,
    		'mensagem' => 'Não é permitido empate para este modelo de jogo'
    	));
        $vencedor_id = "empate";
    }
    $postagem = $wpdb->update(
        $wpdb->prefix.'_sis__campeonatos_jogos', 
        array(
        	'resultado_time_1' => $resultadoTime1,
            'resultado_time_2' => $resultadoTime2,
            'vencedor_id' => $vencedor_id,
            'resultado_status' => 'Confirmado'
        ),
        array(
            'ID' => $jogo_id
        )
    );
    $user_id = get_current_user_id();
    if($postagem){
        $table = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
        $solicitacao = $wpdb->get_results("SELECT * FROM {$table}  WHERE jogo_id = {$jogo_id} and user_id={$user_id} AND acao = 'Atualização de contestação' ",ARRAY_A);
        if(empty($solicitacao)){
            $data = array(
                'jogo_id' => $jogo_id,
                'user_id' => $user_id,
                'acao' => 'Atualização de contestação'
            );
            $insert = $wpdb->insert($table,$data);
            if(!$insert){
                wp_send_json(array(
                    'error' => true,
                    'mensagem' => 'Erro ao inserir dados'
                ));
            }else{
            	$table = $wpdb->prefix.'_sis__campeonatos_jogos';
            	$fase = $wpdb->get_results("SELECT fase_id,campeonato_id,time_1_id FROM {$table}  WHERE ID = {$jogo_id}",ARRAY_A);
            	$return = apply_filters('verifica_status_fase',$fase[0]['fase_id'],$fase[0]['campeonato_id'],0,$fase[0]['time_1_id']);
                wp_send_json(array(
                    'error' => false,
                    'mensagem' => 'Resultado finalizado'
                ));
            }
        }
        wp_send_json(array(
            'error' => false,
            'mensagem' => 'Já há dados informados por esse usuário para essa partida',
            'data'=> $solicitacao
        ));
    }
    
    wp_send_json($response);
}

add_action('wp_ajax_finalizarContestacaoResultadoJogo', 'finalizarContestacaoResultadoJogo');


function finalizacao_de_resultados($fase_id,$campeonato_id,$now,$data_termino){
	global $wpdb;
	$user_id = get_current_user_id();
	$tabela_de_jogos = $wpdb->prefix.'_sis__campeonatos_jogos';
	$tabela_de_solicitacoes = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
	// Verificar se há pendências ainda nos resultados daquela fase.
    $sql = "
        SELECT 
            *
        FROM
            {$tabela_de_jogos}
        WHERE 
            fase_id = {$fase_id}
        AND
            resultado_status != 'Confirmado'
    ";
    $jogos_nao_finalizados = $wpdb->get_results($sql,ARRAY_A);
    // Se há pendências
    if(!empty($jogos_nao_finalizados)){
    	// Verificar se a fase já se encerrou
    	if($now > $data_termino && !empty($data_termino)){
    		// Verificar se o wo/finalização deve acontecer de forma automática
    		$gerar_wo_automatico = get_post_meta($campeonato_id,'atribuir_wo_automaticamente_para_times_que_nao_postaram_resultado',true);

    		if($gerar_wo_automatico == 'Sim'){
    			// Atualizando resultados pendentes
    			foreach ($jogos_nao_finalizados as $key => $value) {
    				$acao = "";
    				$resultado_status = $value['resultado_status'];
    				// Caso o usuário não tenha contestado o resultado
    				if( $resultado_status != "Contestado"){
    					// Caso esteja pendente a confirmação o resultado é tido como confirmado, caso contrário WO é gerado.
    					if($resultado_status == "Confirmacao pendente" ){
    						$acao = "Falta de confirmação";
		    				$args = array(
		    					'resultado_status' => 'Confirmado'
		    				);
    					}else{
    						$acao = "Falta de postagem de resultado";
    						$args = array(
    							'resultado_time_1' => 0,
    							'resultado_time_2' => 0,
    							'vencedor_id' => 0,
		    					'resultado_status' => 'Confirmado'
		    				);
    					}
	    				$where = array(
	    					'ID' => $value['ID'],
	    					'numero_do_jogo' => $value['numero_do_jogo'],
	    					'fase_id' => $fase_id,
	    					'campeonato_id' => $campeonato_id,
	    				);
	    				$wpdb->update($tabela_de_jogos,$args,$where);

	    				// Registra ação do sistema
			            $data = array(
			                'jogo_id' => $value['ID'],
			                'user_id' => $user_id,
			                'acao' => 'Sistema finalizando jogo por motivo de '.$acao
			            );
        				$wpdb->insert($tabela_de_solicitacoes,$data);
	    			}
    			}
    			return true;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }else{
    	return true;
    }
}

function verifica_status_fase($fase_id,$campeonato_id,$acao_manual = 0,$time_id=NULL){
    global $wpdb;
    $user_id = get_current_user_id();
    $validacao = true;
    // Tabelas 
    	// Tabela de jogos
	    $tabela_de_jogos = $wpdb->prefix.'_sis__campeonatos_jogos';

	    // Tabela de fases 
	    $tabela_de_fases = $wpdb->prefix.'_sis__campeonatos_fases';

	    //Tabela solicitações
	    $tabela_de_solicitacoes = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';

    // Método de inicio da próxima fase
    	$parametro = get_post_meta($campeonato_id,'iniciar_proxima_fase',true);

    // Datas
    	$sql_data_fase = "SELECT * FROM {$tabela_de_fases} WHERE ID = {$fase_id} AND status = 'Em progresso' ";

		$data_fase_results = $wpdb->get_results($sql_data_fase,ARRAY_A);

		if(empty($data_fase_results)){
			return "Fase não está em progresso";
		}
    	$now = strtotime('now') -10800;

		$proxima_fase_id = $data_fase_results[0]['proxima_fase_id'];
    	//Data atual
    	// Data de início da fase
		$data_inicio = strtotime($data_fase_results[0]['data_inicio']);
		// Data de término da fase
		$data_termino = strtotime($data_fase_results[0]['data_encerramento']);

	// Número de jogos da fase
		$sql_count = "
	        SELECT 
	            count(*) as num
	        FROM
	            {$tabela_de_jogos}
	        WHERE 
	            fase_id = {$fase_id}
	    ";
		$jogos_totais = $wpdb->get_results($sql_count,ARRAY_A);
		$num_jogos = $jogos_totais[0]['num'];

	// Verificãção do método de geração de fases
		switch ($parametro) {
			case 'resultados':
				// Caso a próxima fase precise de todos os jogos realizados, é necessário finalizar os pendetes
    			$validacao = finalizacao_de_resultados($fase_id,$campeonato_id,$now,$data_termino);
				break;

			case 'data': 
				if($now < $data_termino && !empty($data_termino)){
					$validacao = false;
				}else{
					// Caso a próxima fase seja realizada com base na data, é necessário finalizar os pendetes
					$validacao = finalizacao_de_resultados($fase_id,$campeonato_id,$now,$data_termino);
				}
				break;
			case 'manual':
				if($acao_manual == 1){
					// Caso a próxima fase seja realizada com base na data, é necessário finalizar os pendetes
					$validacao = finalizacao_de_resultados($fase_id,$campeonato_id,$now,$data_termino);
				}else{
					$validacao = false;
				}
				break;
			default:
				$validacao = false;
				break;
		}
	
	//	O time será insrido na próxima fase a cada partida ?
		$insercao_proxima_fase = get_post_meta($campeonato_id,'como_os_times_serao_vinculados_na_proxima_fase',true);
		if($insercao_proxima_fase == 'partida' && !empty($time_id) && $time_id != 0 && $data_fase_results[0]['nome_fase'] != 'Final'){
			$jogo_do_time= "
            	SELECT 
	                *
            	FROM
	                {$tabela_de_jogos}
            	WHERE 
	                fase_id = {$fase_id} 
               	AND 
               		(
               			time_1_id = {$time_id} 
               				OR 
               			time_2_id = {$time_id}
               		) 
               	AND 
               		resultado_status = 'Confirmado'
            	ORDER BY 
	            	numero_do_jogo 
            	ASC
        	";
	    	$jogos_time_concluido = $wpdb->get_results($jogo_do_time,ARRAY_A);
	    	$ordem_jogo_time = $jogos_time_concluido[0]['numero_do_jogo'];
    		$time = ($ordem_jogo_time%2 ==0) ? 'time_2_id' : 'time_1_id';
    		$args = array( 
            	$time => empty($jogos_time_concluido[0]['vencedor_id']) ? 0 : $jogos_time_concluido[0]['vencedor_id'],
	        	'resultado_status' => 'Em Aberto'
        	);
        	$where = array(
            	'campeonato_id' => $jogos_time_concluido[0]['campeonato_id'],
            	'fase_id' => $proxima_fase_id,
        		'numero_do_jogo' => ($ordem_jogo_time%2 == 0 ) ? ($ordem_jogo_time/2) : (($ordem_jogo_time/2)+0.5)
        	);        	
	        $update = $wpdb->update($tabela_de_jogos,$args,$where);
		}

		// Busca e classificação dos times para próxima fase
		if($validacao == true && $data_fase_results[0]['nome_fase'] != 'Final'){
        	$jogos_da_fase= "
            	SELECT 
	                *
            	FROM
	                {$tabela_de_jogos}
            	WHERE 
	                fase_id = {$fase_id} 
            	ORDER BY 
	            	numero_do_jogo 
            	ASC
        	";
	    	$chaves = array();
	    	$jogos_fases_concluidos = $wpdb->get_results($jogos_da_fase,ARRAY_A);
        	for ($i=0; $i < $num_jogos ; $i+=2) { 
            	array_push($chaves,array(
                	'time_1' => empty($jogos_fases_concluidos[$i]['vencedor_id']) ? 0 : $jogos_fases_concluidos[$i]['vencedor_id'],
                	'time_2' => empty($jogos_fases_concluidos[$i+1]['vencedor_id']) ? 0 : $jogos_fases_concluidos[$i+1]['vencedor_id'],
                	'campeonato_id' => $jogos_fases_concluidos[$i]['campeonato_id'],
                	'fase_id' => $jogos_fases_concluidos[$i]['fase_id'],
            	));
        	}
	    	$cont = 1; 
        	$nova_fase = 0;
        	foreach ($chaves as $key => $value) {
        		if($value['time_1'] == 0){
        			$args = array(
		        		'time_1_id' => $value['time_1'],
	        			'time_2_id' => $value['time_2'],
                        'vencedor_id' => $value['time_2'],
                        'resultado_time_1' => 0 ,
                        'resultado_time_2' => 3,
                        'wo' =>  'Sim',
                        'resultado_status' => 'Confirmado'
		        	);
        		}elseif($value['time_2'] == 0){
        			$args = array(
		        		'time_1_id' => $value['time_1'],
	        			'time_2_id' => $value['time_2'],
                        'vencedor_id' => $value['time_1'],
                        'resultado_time_1' => 3,
                        'resultado_time_2' => 0,
                        'wo' =>  'Sim',
                        'resultado_status' => 'Confirmado'
		        	);
        		}else{
			        $args = array(
		        		'time_1_id' => $value['time_1'],
	        			'time_2_id' => $value['time_2'],
		        		'resultado_status' => 'Em Aberto'
		        	);
			    }
	        	$where = array(
		        	'campeonato_id' => $value['campeonato_id'],
	        		'fase_id' => $proxima_fase_id,
	        		'numero_do_jogo' => $cont
	        	);
	        	//return $args;
	        	$update = $wpdb->update($tabela_de_jogos,$args,$where);
	        	$cont++;
	        	$nova_fase = $proxima_fase_id;
        	}        	
        	$data = array(
	        	'status' => 'Concluído'
        	);
        	$where = array(
	        	'ID' => $fase_id,
        	);
        	$wpdb->update($tabela_de_fases,$data,$where);
        	$args = array(
	        	'status' => 'Em progresso'
        	);
        	$where = array(
	        	'ID' => $nova_fase,
        	);
	    	$wpdb->update($tabela_de_fases,$args,$where);
		}else{
			if($data_fase_results[0]['nome_fase'] == 'Final'){
				$data = array(
		        	'status' => 'Concluído'
	        	);
	        	$where = array(
		        	'ID' => $fase_id,
	        	);
	        	$wpdb->update($tabela_de_fases,$data,$where);
	        }
		}
    	return true;
}
add_action('verifica_status_fase','verifica_status_fase',10,4);
add_filter('verifica_status_fase','verifica_status_fase',10,4);

function dataDeFases(){
	global $_POST,$wpdb;
	$fase_id = $_POST['fase_id'];
	$datas = array();
	foreach ($fase_id as $key => $value) {
		array_push($datas,array(
			'data_inicio' => str_replace('T',' ',$_POST['data_inicio_'.$value]),
			'data_encerramento' => str_replace('T',' ',$_POST['data_termino_'.$value]),
			'ID' => $value
		));
	}
	$table = $wpdb->prefix.'_sis__campeonatos_fases';
	foreach ($datas as $key) {
		$data = array(
			'data_inicio' => $key['data_inicio'],
			'data_encerramento' => $key['data_encerramento'],
		);
		$where = array(
			'ID' => $key['ID']
		);
		$wpdb->update($table,$data,$where);
	}
	wp_send_json(array(
        'error' => false,
        'data' => $datas,
        'mensagem' => 'Datas definidas com sucesso'
    ));
}
add_action('wp_ajax_dataDeFases','dataDeFases',10);

function finalizaFaseManual(){
	global $_POST;
	$campeonato_id = $_POST['campeonato_id'];
	$fase_id = $_POST['fase_id'];
	$acao_manual = $_POST['manual'];
	if($campeonato_id && $fase_id && $acao_manual){
		$return = apply_filters('verifica_status_fase',$fase_id,$campeonato_id,$acao_manual);
		if($return){
			wp_send_json(array(
				'error' => false,
				'mensagem' => 'Fase atualizada'
			));
		}else{
			wp_send_json(array(
				'error' => true,
				'mensagem' => $return
			));
		}
	}else{
		wp_send_json(array(
			'error' => true,
			'mensagem' => 'Verifique os dados'
		));
	}
}
add_action('wp_ajax_finalizaFaseManual','finalizaFaseManual',10);

function buscaSolicitacoes(){
	global $wpdb,$_POST;
	$campeonato_id = $_POST['campeonato_id'];
    $permissao_global = current_user_can('manage_options');
	$tabela_de_solicitacoes = $wpdb->prefix.'_sis__campeonatos_jogos_reports';
	$user_id = get_current_user_id();
	$sql_solicitacoes = "
		SELECT 
			*
		FROM 
			{$tabela_de_solicitacoes}
		WHERE 
			campeonato_id = {$campeonato_id}
		/*AND
			status != 'Finalizado'*/
	";
    if(!$permissao_global){
        $sql_solicitacoes.=" AND user_id={$user_id}";
    }
	$solicitacoes = $wpdb->get_results($sql_solicitacoes,ARRAY_A);
	if(!empty($solicitacoes)){
    	$solicitacoes[0]['permissao_global'] = $permissao_global;
    }
	wp_send_json($solicitacoes);
}
add_action('wp_ajax_buscaSolicitacoes','buscaSolicitacoes',10);

function buscaChamado(){
	global $wpdb,$_POST;
	$chamado_id = $_POST['chamado_id'];
	$permissao_global = current_user_can('manage_options');
	$tabela_de_solicitacoes = $wpdb->prefix.'_sis__campeonatos_jogos_reports';
	$tabela_de_jogos = $wpdb->prefix.'_sis__campeonatos_jogos';
	$tabela_de_times = $wpdb->prefix.'_sis__time';
	$user_id = get_current_user_id();
	$sql_solicitacoes = "
		SELECT 
			*
		FROM 
			{$tabela_de_solicitacoes}
		WHERE 
			ID = {$chamado_id}		
	";
	$solicitacoes = $wpdb->get_results($sql_solicitacoes,ARRAY_A);
	$solicitacoes[0]['data'] =  date('d/m/Y H:i:s',strtotime($solicitacoes[0]['data']));
	$solicitacoes[0]['data_atualizacao'] =  date('d/m/Y H:i:s',strtotime($solicitacoes[0]['data_atualizacao']));
	$solicitacoes[0]['arquivo'] =  wp_get_attachment_url($solicitacoes[0]['arquivo_id']);
    $solicitacoes[0]['arquivo_retorno'] =  wp_get_attachment_url($solicitacoes[0]['arquivo_retorno_id']);
	if(!empty($solicitacoes[0]['jogo_id'])){
		$busca_jogo = "
			SELECT
				time_1_id,time_2_id,resultado_time_1,resultado_time_2
			FROM 	
				{$tabela_de_jogos}
			WHERE
				ID = {$solicitacoes[0]['jogo_id']}
		";
		$jogo = $wpdb->get_results($busca_jogo,ARRAY_A);
		if(!empty($jogo)){
			$busca_time = "
				SELECT 
					ID,time_nome
				FROM
					{$tabela_de_times}
				WHERE 
					ID IN ({$jogo[0]['time_1_id']},{$jogo[0]['time_2_id']})
			";
			$times = $wpdb->get_results($busca_time,ARRAY_A);
		}
		$jogos = array();
		foreach ($times as $key) {
			$jogos[] = array(
				'time_nome' => $key['time_nome'],
				'time_resultado' => ($key['ID'] == $jogo[0]['time_1_id']) ? $jogo[0]['resultado_time_1'] : $jogo[0]['resultado_time_2']
			);
		}
		$solicitacoes[0]['jogo'] = $jogos;
	}
	if($solicitacoes[0]['status'] == 'Aberto' && $solicitacoes[0]['user_id'] != $user_id){
		$solicitacoes[o]['status'] = "Visualizado";
		$solicitacoes[0]['data_atualizacao'] =  date('d/m/Y H:i:s',strtotime('now') - 10800);
		$data = array(
			'status' => 'Visualizado',
			'data_atualizacao' => date('Y-m-d H:i:s')
		);
		$where = array(
			'ID' => $solicitacoes[0]['ID']
		);
		$wpdb->update($tabela_de_solicitacoes,$data,$where);
	}
    if(!empty($solicitacoes)){
    	$solicitacoes[0]['permissao_global'] = $permissao_global;
    }
	wp_send_json($solicitacoes);
}
add_action("wp_ajax_buscaChamado",'buscaChamado',10);

function fecharChamado(){
	global $wpdb,$_POST,$_FILES;
    $permissao_global = current_user_can('manage_options');
    if(!$permissao_global){
        wp_send_json(
            array(
                'error' => true,
                'mensagem' => 'Você não tem permissão pra fazer isso',
            )
        ); 
    }
    //Regras para salvar conversação
    $chamado_id = $_POST['chamado_id'];
	$tabela_mensagens = $wpdb->prefix.'_sis__campeonatos_jogos_reports';
	if($_FILES['arquivo_para_solicitante']['size'] > 0  && !empty($_FILES['arquivo_para_solicitante']['tmp_name'])){
        $wordpress_upload_dir = wp_upload_dir(); 
        $arquivo = $_FILES['arquivo_para_solicitante'];
        $new_file_path = $wordpress_upload_dir['path'] . '/' . $arquivo['name'];
        $new_file_mime = mime_content_type( $arquivo['tmp_name'] );
        if( $arquivo['error'] ){
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'Não foi possível realizar o upload do arquivo',
                    'data' => $arquivo['error']
                )
            ); 
        }
        if( $arquivo['size'] > wp_max_upload_size() ){
            wp_send_json(
                array(
                    'error' => true,
                    'mensagem' => 'A imagem é muito grande, tente realizar o upload de uma imagem menor',
                    'data' => $arquivo['error']
                )
            ); 
        }
        if( move_uploaded_file( $arquivo['tmp_name'], $new_file_path ) ) { 
            $upload_id = wp_insert_attachment( array(
                'guid'           => $new_file_path, 
                'post_mime_type' => $new_file_mime,
                'post_title'     => preg_replace( '/\.[^.]+$/', '', $arquivo['name'] ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $new_file_path );
         
            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
        }

    }
	$args = array(
		'retorno_mensagem' => $_POST['mensagem_para_solicitante'],
		'arquivo_retorno_id' => $upload_id,
		'status' => 'Finalizado'
	);
	$where = array(
		'ID' => $chamado_id
	);
	$registro = $wpdb->update($tabela_mensagens,$args,$where);
	if(!$registro){
		wp_send_json(
            array(
                'error' => true,
                'mensagem' => 'Não foi possível registrar sua solicitação, tente novamente',
                'data' => $wpdb->last_error,
                'args' => $args
            )
        ); 
	}
	wp_send_json(
        array(
            'error' => false,
            'mensagem' => 'Solicitação finalizada com sucesso',
            'args' => $args
        )
    ); 
}
add_action('wp_ajax_fecharChamado','fecharChamado',10);

function logoutUser(){
    wp_logout();
    
    wp_send_json(true);
}
add_action('wp_ajax_logoutUser', 'logoutUser');
add_action('wp_ajax_nopriv_logoutUser', 'logoutUser');