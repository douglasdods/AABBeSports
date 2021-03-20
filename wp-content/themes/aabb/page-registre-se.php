<?php
get_header();
    if(!is_user_logged_in()){
    	?>
    <div id="page-cadastro" class="background-cinza">
        
        <div class="container container-page margin-top-25">
            <div class="row">
                <div class="col-lg-4 margin-top-25">
                    
                </div>
                <div class="col-lg-8 margin-top-25">
                    <div class="box-cadastro background-azul border-radius">
                        
                        <div class="row row-formulario-cadastro">
                            <div class="col-12">
                                <h1 class="titulo-cadastro"> Criar conta</h1>
                                <form class="form-cadastro">
                                    
                                
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="username" id="username" maxlength="50" placeholder="Nome de usuário">
                                            <div id="error-username" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="display_name" maxlength="50" placeholder="Nome completo">
                                            <div id="error-nome" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="user_email" maxlength="60" placeholder="E-mail">
                                            <div id="error-email-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-email-invalido" class="invalid-feedback">
                                                Informe um endereço de e-mail válido!
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="user_telefone" id="user_telefone" placeholder="Telefone">
                                            <div id="error-telefone-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-telefone-invalido" class="invalid-feedback">
                                                Informe um telefone válido!
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row form-group">
                                    
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="user_pass" placeholder="Senha de acesso">
                                            <div id="error-senha" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="user_socio_aabb">Sócio AABB? *</label>
                                            <select id="user_socio_aabb" class="form-control" name="user_socio_aabb">
                                                <option value="Sim">Sim</option>
                                                <option value="Não" selected="selected">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box-cidade-aabb">    
                                                <label for="user_cidade_aabb">Cidade AABB</label>
                                                <input type="text" name="user_cidade_aabb" id="user_cidade_aabb" class="form-control">
                                                <div id="error-cidade-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-botao-cadastrar">
                                            <a class="botao-enviar-cadastro background-roxo border-radius" type="submit">Cadastrar</a>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-mensagem-erro margin-top-25">
                                            <div class="alert alert-danger mensagem-erro" role="alert">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>

                        </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separador-100 background-cinza"></div>
    <?php
	}else{ ?>
		<script type="text/javascript">
			window.location = "/";
		</script>
<?php
	}
get_footer();