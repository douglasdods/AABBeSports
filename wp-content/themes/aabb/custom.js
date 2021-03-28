$(function (jQuery) {
    function register_uer_in_camp(){
        $('.action-inscrevase').click(function () {
            $(this).hide();
            var user_id = $(this).attr('data-user-id');
            var campeonato_id = $(this).attr('data-campeonato-id');
            var id_jogo = $('input[name="id_jogo"]').val();
            var nome_equipe = $('input[name="nome-equipe"]').val();
            if (nome_equipe == 'undefined') {
            	nome_equipe = '';
            }

            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                data:{
                    'action': 'register_user_campeonato',
                    'user_id' : user_id,
                    'campeonato_id' : campeonato_id,
                    'nome_equipe': nome_equipe,
                    'id_jogo' : id_jogo,
                }
            }).done(function (response){
                console.log(response);
                if (response != 'false'){
                    $('.modal-body-custom .box-confirmacao-sucesso').show();
                    setTimeout(
                        function(){
                            location.reload();
                        }, 2000);
                }else{
                    $('.modal-body-custom .box-confirmacao-erro').show();
                }
            });
        });
    }

    function add_redirect_url(){
        $('.ur-submit-button').on('click', function () {
            var url = window.location.search;
            url = url.split("?redirect=");
            console.log(url[1]);
            $('input[name="ur-redirect-url"]').val(url[1]);
        })
    }

    function instacia_tables() {
        $('#table-todos-campeonatos, #table-jogos-campeonatos').DataTable( {
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            },
            "language": {
                "lengthMenu": "Itens por pagina _MENU_",
                "zeroRecords": "Nenhum campeonato encontrado",
                "info": "Exbibindo pagína _PAGE_ de _PAGES_",
                "search": "Buscar",
                "infoFiltered": "(filtrado do total de _MAX_ registros)",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
            }
        } );
    }

    function controle_campos_formulario(){
        $('#funcionario_bb').on('change', function () {
            if($(this).val() == "Sim"){
                $('.box-matricula-funcionario').show();
            }else {
                $('.box-matricula-funcionario').hide();
                $('#user_chave_func_bb').val('');
            }
        });
        $('#user_family_bb').on('change', function () {
            if($(this).val() == "Sim"){
                $('#chave_family_bb_field').show('100');
                $('#familiar_parentesco_field').show('100');
                $('#empresa_parceira_field').hide('100');
                $('#user_matricula_field').hide('100');
            }else {
                $('#chave_family_bb_field').hide('100');
                $('#familiar_parentesco_field').hide('100');
                $('#empresa_parceira').val('');
                $('#empresa_parceira_field').show('100');
            }
        });

        $('#empresa_parceira').on('change', function () {
            if($(this).val() == "Sim"){
                $('#user_matricula_field').show('100');
            }else {
                $('#user_matricula_field').hide('100');
            }
        });
        $('#user_socio_aabb').on('change', function () {
            if($(this).val() == "Sim"){
                $('.box-cidade-aabb').show();
            }else {
                $('.box-cidade-aabb').hide();
                $('#user_cidade_aabb').val('');
            }
        });
    }

    function formataCpf(){
        jQuery('#user_cpf').keyup(function(event){
            var str = "";
            var valor = jQuery('#user_cpf').val();
            valor = valor.replace(/[^0-9]+/g,'');
            valor = valor.substring(0,11);
            for(i=0;i < valor.length; i++){
                if(i==3){str = str +'.'};
                if(i==6){str = str +'.'};
                if(i==9){str = str +'-'};
                str = str+ (valor[i].toString());
            }
            jQuery('#user_cpf').val(str);
            
        });
    }
     function formataData(){
        $('#user_data_nascimento').keyup(function(event){
            var str = "";
            var valor = $('#user_data_nascimento').val();
            valor = valor.replace(/[^0-9]+/g,'');
            valor = valor.substring(0,8);
            for(i=0;i < valor.length; i++){
                if(i==2 || i==4){str = str +'/'};
                str = str+ (valor[i].toString());
            }
            $('#user_data_nascimento').val(str);
            
        });
    }
    function formataTelefone(){
        $('#user_telefone').keyup(function(event){
            var str = "";
            var valor = $('#user_telefone').val();
            valor = valor.replace(/[^0-9]+/g,'');
            valor = valor.substring(0,11);
            for(i=0;i < valor.length; i++){
                if(i==0){str = str +'('};
                if(i==2){str = str +') '};
                if(valor.length == 10)
                    if(i==6){str = str +'-'};
                if(valor.length == 11)
                    if(i==7){str = str +'-'};
                str = str+ (valor[i].toString());
            }
            $('#user_telefone').val(str);
            
        });
    }

    function formataChaveBB(){
        $('#user_chave_func_bb').keyup(function(event){
            var str = "";
            var valor = $('#user_chave_func_bb').val();
            
            valor = valor.replace(/[^A-Z0-9]+/g,'');
            valor = valor.substring(0,9);

            for(i=0;i < valor.length; i++){
                if(i==1){str = str +' '};
                if(i==2 || i==5){str = str +'.'};
                if(i==8){str = str +'-'};
                str = str+ (valor[i].toString());
            }
            $('#user_chave_func_bb').val(str);
            
        });
    }

    function registerUser(){
        $('.botao-enviar-cadastro').click(function(){
            $('div[id^="error-"').hide();
            if (!validar_formulario()) {
                let username = $('#username').val();
                let nome = $('input[name="display_name"]').val();
                let email = $('input[name="user_email"]').val();
                let senha = $('input[name="user_pass"]').val();
                //let data_nascimento = $('input[name="user_data_nascimento"]').val();
                //let sexo = $('#sexo').val();
                //let cpf = $('input[name="user_cpf"]').val();
                //let cidade = $('input[name="cidade"]').val();
                //let estado = $('#user_estado').val();
                let telefone = $('#user_telefone').val();
                
                $.ajax({
                    beforeSend: function(){
                        $('.div-load').show();
                        jQuery('.mensagem-erro').hide();
                    },
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action' : 'custom_register_user',
                        'username' :  username,
                        'display_name' :  nome,
                        'user_email' : email,
                        'user_pass' : senha,
                        'user_telefone' : telefone,
                    },
                    success: function(response){
                        $('.div-load').hide();
                        if(response.erro == 0){
                            window.location = "/meus-dados/";
                        }else{
                            jQuery('.mensagem-erro').append(response.mensagem);
                            jQuery('.mensagem-erro').show();
                        }
                    }
                });
            
            }
            
        });
    }

    function updateUser(){
        $('.botao-atualizar-cadastro').click(function(){
            $('div[id^="error-"').hide();
            if (!validar_formulario_update()) {
                let nome = $('input[name="display_name"]').val();
                let email = $('input[name="user_email"]').val();
                let senha = $('input[name="user_pass"]').val();
                let data_nascimento = $('input[name="user_data_nascimento"]').val();
                let sexo = $('#sexo').val();
                let cpf = $('input[name="user_cpf"]').val();
                let cidade = $('input[name="cidade"]').val();
                let estado = $('#user_estado').val();
                let telefone = $('#user_telefone').val();
                let user_socio_aabb = $('#user_socio_aabb').val(); 
                let user_cidade_aabb = $('#user_cidade_aabb').val();
                
                $.ajax({
                    beforeSend: function(){
                        $('.div-load').show();
                        jQuery('.mensagem-erro').hide();
                    },
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action' : 'custom_update_user',
                        'display_name' :  nome,
                        'user_email' : email,
                        'user_pass' : senha,
                        'user_data_nascimento' : data_nascimento,
                        'sexo' : sexo,
                        'user_cpf' : cpf,
                        'cidade' : cidade,
                        'user_estado' : estado,
                        'user_telefone' : telefone,
                        'user_socio_aabb': user_socio_aabb,
                        'user_cidade_aabb': user_cidade_aabb,
                    },
                    success: function(response){
                        $('.div-load').hide();
                        if(response.erro == 0){
                            window.location = "/meus-dados/";
                        }else{
                            jQuery('.mensagem-erro').append(response.mensagem);
                            jQuery('.mensagem-erro').show();
                        }
                    }
                });
            
            }
            
        });
    }

    function validar_formulario(){
        let error = 0;
        if (!$('#username').val()){
            $('#error-username').show();
            error = 1;
        }
        if (!$('input[name="display_name"]').val()){
            $('#error-nome').show();
            error = 1;
        }
        if (!$('input[name="user_email"]').val()){
            $('#error-email-vazio').show();
            error = 1;
        }else{
            var sEmail  =$('input[name="user_email"]').val();
            // filtros
            var emailFilter=/^.+@.+\..{2,}$/;
            var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
            // condição
            if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
                $('#error-email-invalido').show();
                error = 1;
            }
        }
        if (!$('input[name="user_pass"]').val()){
            $('#error-senha').show();
            error = 1;
        }
        if (!$('#user_telefone').val()){
            $('#error-telefone-vazio').show();
            error = 1;
        }else{
            var valor = $('input[name="user_telefone"]').val();
            if (valor.length <= 13) {
                $('#error-telefone-invalido').show();
                error = 1;
            }
        }
        /*if (!$('input[name="user_data_nascimento"]').val()){
            $('#error-data_nascimento').show();
            error = 1;
        }else{
            var valor = $('input[name="user_data_nascimento"]').val();
            if (valor.length != 10) {
                $('#error-data-invalido').show();
                error = 1;
            }
        }
        if (!$('#sexo').val()){
            $('#error-sexo').show();
            error = 1;
        }
        if (!$('input[name="user_cpf"]').val()){
            $('#error-cpf-vazio').show();
            error = 1;
        }else{
            var value = $('input[name="user_cpf"]').val();
            value = value.replace('.','');
            value = value.replace('.','');
            cpf = value.replace('-','');
            if (cpf.length == 11) {    
                var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                var a = [];
                var b = new Number;
                var c = 11;
                for (i=0; i<11; i++){
                    a[i] = cpf.charAt(i);
                    if (i < 9) b += (a[i] * --c);
                }
                if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
                b = 0;
                c = 11;
                for (y=0; y<10; y++) b += (a[y] * c--);
                if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

                var retorno = true;
                if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
                if (!retorno) {
                    $('#error-cpf-invalido').show();
                    error = 1;
                }
            }else{
                $('#error-cpf-invalido').show();
                error = 1;
            }
            

        }
        if (!$('input[name="cidade"]').val()){
            $('#error-cidade').show();
            error = 1;
        }
        if (!$('#user_estado').val()){
            $('#error-estado').show();
            error = 1;
        }*/
        if ($("#user_socio_aabb").val() == 'Sim') {
            if (!$('#user_cidade_aabb').val()){
                $('#error-cidade-aabb').show();
                error = 1;
            }
            
        }
        /*if ($("#funcionario_bb").val() == 'Sim') {
            if (!$('#user_chave_func_bb').val()){
                $('#error-matricula-func').show();
                error = 1;
            }

        }*/
        return error;
        
    }
    function validar_formulario_update(){
        let error = 0;
        
        if (!$('input[name="display_name"]').val()){
            $('#error-nome').show();
            error = 1;
        }
        if (!$('input[name="user_email"]').val()){
            $('#error-email-vazio').show();
            error = 1;
        }else{
            var sEmail  =$('input[name="user_email"]').val();
            // filtros
            var emailFilter=/^.+@.+\..{2,}$/;
            var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
            // condição
            if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
                $('#error-email-invalido').show();
                error = 1;
            }
        }
        
        if (!$('input[name="user_data_nascimento"]').val()){
            $('#error-data_nascimento').show();
            error = 1;
        }else{
            var valor = $('input[name="user_data_nascimento"]').val();
            if (valor.length != 10) {
                $('#error-data-invalido').show();
                error = 1;
            }
        }
        if (!$('#sexo').val()){
            $('#error-sexo').show();
            error = 1;
        }
        if (!$('input[name="user_cpf"]').val()){
            $('#error-cpf-vazio').show();
            error = 1;
        }else{
            var value = $('input[name="user_cpf"]').val();
            value = value.replace('.','');
            value = value.replace('.','');
            cpf = value.replace('-','');
            if (cpf.length == 11) {    
                var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                var a = [];
                var b = new Number;
                var c = 11;
                for (i=0; i<11; i++){
                    a[i] = cpf.charAt(i);
                    if (i < 9) b += (a[i] * --c);
                }
                if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
                b = 0;
                c = 11;
                for (y=0; y<10; y++) b += (a[y] * c--);
                if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

                var retorno = true;
                if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
                if (!retorno) {
                    $('#error-cpf-invalido').show();
                    error = 1;
                }
            }else{
                $('#error-cpf-invalido').show();
                error = 1;
            }
            

        }
        if (!$('input[name="cidade"]').val()){
            $('#error-cidade').show();
            error = 1;
        }
        if (!$('#user_estado').val()){
            $('#error-estado').show();
            error = 1;
        }
        if ($("#user_socio_aabb").val() == 'Sim') {
            if (!$('#user_cidade_aabb').val()){
                $('#error-cidade-aabb').show();
                error = 1;
            }
            
        }
        if ($("#funcionario_bb").val() == 'Sim') {
            if (!$('#user_chave_func_bb').val()){
                $('#error-matricula-func').show();
                error = 1;
            }

        }
        return error;
        
    }

    function mostrarMembrosTimes(){
        $('.bnt-ver-membros').click(function(){

            var time_id = $(this).attr('data-time-id');
            var campeonato_id = $('#campeonato-id').val();
            $.ajax({
                beforeSend: function(){
                    $('.row-listagem-times-inscricao').hide();
                    $('.div-load').show();
                },
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action' : 'mostrarMembrosTimes',
                    'time_id' :  time_id,
                    'campeonato_id' : campeonato_id
                },
                success: function(response){
                    console.log(response);
                    $('#time-selecionado').val(time_id);
                    $.each(response, function(key,iten){
                        $('#membros-time-inscricao tbody').append('<tr><th scope="row"><input class="form-check-input" type="checkbox" value="'+iten.user_id+'"></th><td class="text-left">'+iten.display_name+'</td><td class="text-left"><input type="text" name="nick-name-'+iten.user_id+'" id="nick-name-'+iten.user_id+'"></td></tr>');
                        console.log(iten.display_name);

                    });
                    $('.row-listagem-membros-inscricao').show();

                }
            });
        });
        $('.btn-cancelar-inscricao-jogadores').click(function(){
            $('.row-listagem-membros-inscricao').hide();
            $('#membros-time-inscricao tbody tr').remove();
            $('.row-listagem-times-inscricao').show();

        });
        $('.btn-salvar-jogadores').click(function(){
            var num_jogadores = $('.form-check-input:checked').length;
            var min_jogadores = $('.num_min_jogadores').val();
            var max_jogadores = $('.num_max_jogadores').val();
            var erro_nickname = 0;
            if (num_jogadores >= min_jogadores && num_jogadores <= max_jogadores) {
                var jogadores = [];
                $('.form-check-input:checked').each(function(){
                    jogadores.push( [{"id_jogador":$(this).val(),"nickname":$('#nick-name-'+$(this).val()).val()}]);
                    if(!$('#nick-name-'+$(this).val()).val()){
                        erro_nickname = 1;
                        console.log(erro_nickname);
                    }
                });
                console.log(jogadores);
                var time_id = $('#time-selecionado').val();
                var campeonato_id = $('#campeonato-id').val();
                var capitao_id = $('#capitao-id').val();
                console.log(jogadores);
                if(erro_nickname == 0){

                    $.ajax({
                        beforeSend: function(){
                            $('.row-listagem-times-inscricao').hide();
                            $('.div-load').show();
                        },
                        url: '/wp-admin/admin-ajax.php',
                        type: 'POST',
                        data: {
                            'action' : 'inscreverMembrosTimes',
                            'time_id' :  time_id,
                            'campeonato_id' :  campeonato_id,
                            'capitao_id' : capitao_id,
                            'jogadores' : jogadores,
                        },
                        success: function(response){
                            console.log(response);
                            if (response.error == true) {
                                alert(response.mensagem);
                            }else{
                                location.reload();
                            }
                        }
                    });
                }else{
                    alert('É necessário informar o nickname de todos os jogadores.');
                }
            }else{
                alert('Número de jogadores não está dentro do necessário');
            }
        });
    }

    function salvarResultados(){
        $('.btn-salvar-resultado').click(function(){
            var jogo_id = $(this).attr('data-jogo');
            var campeonato_id = $(this).attr('campeonato_id');
            var resultadoTime1 = $('#resultado-time-1-'+jogo_id).val();
            var resultadoTime2 = $('#resultado-time-2-'+jogo_id).val();
            var time_1_id = $('#resultado-time-1-'+jogo_id).attr('data-time');
            var time_2_id = $('#resultado-time-2-'+jogo_id).attr('data-time');
            if(resultadoTime1 == resultadoTime2){
                alert('Não é possível haver empate nessa etapa do campeonato');
            }else{
                $.ajax({
                    beforeSend: function(){
                        /*$('.row-listagem-times-inscricao').hide();
                        $('.div-load').show();*/
                    },
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action' : 'salvarResultadoJogos',
                        'jogo_id' :  jogo_id,
                        'resultadoTime1' : resultadoTime1,
                        'resultadoTime2' : resultadoTime2,
                        'time_1_id' : time_1_id,
                        'time_2_id' : time_2_id,
                        'campeonato_id' : campeonato_id
                    },
                    success: function(response){
                        console.log(response);
                        alert(response['mensagem']);
                        location.reload()
                        /*if (response.error == true) {
                            alert(response.mensagem);
                        }else{
                            location.reload();
                        }*/
                    }
                });
            }
        });

        
    }
    function confirmarResultados(){
        $('.btn-confirmar-resultado').click(function(){
            var jogo_id = $(this).attr('data-jogo');
            $.ajax({
                beforeSend: function(){
                    /*$('.row-listagem-times-inscricao').hide();
                    $('.div-load').show();*/
                },
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action' : 'ConfirmarResultadoJogo',
                    'jogo_id' :  jogo_id,

                },
                success: function(response){
                    console.log(response);
                    alert(response['mensagem']);
                    location.reload()
                    /*if (response.error == true) {
                        alert(response.mensagem);
                    }else{
                        location.reload();
                    }*/
                }
            });
        });
    }
    function finalizarContestacaoResultados(){
        $('.btn-finalizar-contestacao-resultado').click(function(){
            var jogo_id = $(this).attr('data-jogo');
            var resultadoTime1 = $('#resultado-time-1-'+jogo_id).val();
            var resultadoTime2 = $('#resultado-time-2-'+jogo_id).val();
            var time_1_id = $('#resultado-time-1-'+jogo_id).attr('data-time');
            var time_2_id = $('#resultado-time-2-'+jogo_id).attr('data-time');
            $.ajax({
                beforeSend: function(){
                    /*$('.row-listagem-times-inscricao').hide();
                    $('.div-load').show();*/
                },
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action' : 'finalizarContestacaoResultadoJogo',
                    'jogo_id' :  jogo_id,
                    'resultadoTime1' : resultadoTime1,
                    'resultadoTime2' : resultadoTime2,
                    'time_1_id' : time_1_id,
                    'time_2_id' : time_2_id,
                },
                success: function(response){
                    console.log(response);
                    alert(response['mensagem']);
                    if(response['error'] == false){
                        location.reload()
                    }
                    /*if (response.error == true) {
                        alert(response.mensagem);
                    }else{
                        location.reload();
                    }*/
                }
            });
        });
    }
    function mostraJogadoresTimeCampeonatoSingle(){
        $('.btn-ver-membros-campeonato').click(function(){
            var time_id = $(this).attr('data-time-id');
            var campeonato_id = $("#universal-campeonato-id").val();

            $.ajax({
                beforeSend: function(){
                   
                },
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action' : 'mostrarMembrosTimesCampeonato',
                    'time_id' :  time_id,
                    'campeonato_id' : campeonato_id
                },
                success: function(response){
                    console.log(response);

                    $.each(response, function(key,iten){
                        $('#membros-time-inscritos-camp tbody').append('<tr class="lista-jogadores"><td class="text-left">'+iten.nome_jogador+'</td><td class="text-left">'+iten.nickname+'</td></tr>');
                    });
                    $('#modal-membros-time').show();
                    $('.row-listagem-membros-inscricao').show();

                }
            });
        });
    }
    function fecharModaljogadoresCamp(){
        $('#modal-membros-time').hide();
        $('.lista-jogadores').remove();
    }
    
    function removeTimeCampeonatoSingle(){
        $('.btn-remove-time-campeonato').click(function(){
            if(confirm("Deseja realmente cancelar a inscrição do seu time nesse campeonato ? Essa ação não poderá ser desfeita!")){
                var time_id = $(this).attr('data-time-id');
                var campeonato_id = $("#universal-campeonato-id").val();

                $.ajax({
                    beforeSend: function(){
                       
                    },
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action' : 'removeTimeCampeonato',
                        'time_id' :  time_id,
                        'campeonato_id' : campeonato_id
                    },
                    success: function(response){
                        console.log(response);
                        alert(response['mensagem'])
                        if(response['error'] == false){
                            window.location.reload();
                        }
                    }
                });
            }
        });
    }

    function fase_data(){
        $('#fases_data').submit(function(e){
            e.preventDefault();
            var form = document.querySelector('form#fases_data');
            var data = new FormData(form);
            data.append('action','dataDeFases')
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                type : 'POST',
                processData: false,
                contentType: false,
                data : data
            }).done(function(data){
                console.log(data)
                alert(data['mensagem']);
                location.reload()
            })
        });
    }    

    function finalizaFaseManual(){
        $('#finalizaFaseManual').on('click',function(){
            var campeonato_id = $(this).attr('campeonato_id');
            var fase_id = $(this).attr('fase_id');
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                method : 'POST',
                data :{
                    action : 'finalizaFaseManual',
                    campeonato_id : campeonato_id,
                    fase_id : fase_id,
                    manual : 1,
                }
            }).done(function(data){
                alert(data['mensagem']);
                if(data['error'] == false){
                    location.reload();
                }
            });
        })
    }
    function logoutUser(){
        $('.btn-logout').click(function(){
            $.ajax({
                    url : '/wp-admin/admin-ajax.php',
                    type : 'POST',
                    data: {
                        'action' : 'logoutUser',
                    },
                }).done(function(data){
                   window.location = "/"
                });
        });
    }

    $(document).ready(function () {
        logoutUser();
        salvarResultados();
        confirmarResultados();
        finalizarContestacaoResultados();
        registerUser();
        updateUser();
        formataCpf();
        formataData();
        formataTelefone();
        instacia_tables();
        formataChaveBB();
        mostrarMembrosTimes();
        fase_data();
        finalizaFaseManual();
        $('#user_family_bb_field').hide();
        $('#empresa_parceira_field').hide();
        register_uer_in_camp();
        add_redirect_url();
        controle_campos_formulario();
        $('[data-toggle="tooltip"]').tooltip();
        mostraJogadoresTimeCampeonatoSingle();
        removeTimeCampeonatoSingle();
        

        $('.center').slick({
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                }
            ]
            
        });
        $('.center-2').slick({
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            autoplay: false,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3,
                        autoplay: false,
                        autoplaySpeed: 3000
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                }
            ]
            
        });
    });
})
