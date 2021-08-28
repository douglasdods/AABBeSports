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

                                        <div class="col-md-12">
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
                                            <input type="text" class="form-control" name="user_telefone" id="user_telefone" placeholder="WhatsApp">
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
                                            <input type="text" class="form-control" name="username" id="username" maxlength="50" placeholder="Nome de usuário">
                                            <div id="error-username" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
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
                                                <option value="" selected="selected">-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                            <div id="error-socio_aabb" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <div class="box-estado-aabb">
                                                <label for="user_estado-aabb">Estado AABB</label>
                                                <select id="user_estado-aabb" class="form-control" name="user_estado-aabb">
                                                    <option value="">Selecione o Estado</option>
                                                    <option value="MG">MG</option>
                                                    <option value="SP">SP</option>
                                                    <option value="ES">ES</option>
                                                    <option value="RJ">RJ</option>
                                                </select>
                                                <div id="error-estado-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="box-cidade-aabb">    
                                                <label for="user_cidade_aabb">Cidade AABB</label>
                                                <select id="user_cidade_aabb" name="user_cidade_aabb" class="form-control">
                                                    <option value="">Selecione a Cidade</option>
                                                    <option value="Caratinga" data-estado="MG">Caratinga</option>
                                                    <option value="Belo Horizonte" data-estado="MG">Belo Horizonte</option>
                                                    <option value="São Paulo" data-estado="SP">São Paulo</option>
                                                    <option value="Campinas" data-estado="SP">Campinas</option>
                                                    <option value="Rio de Janeiro" data-estado="RJ">Rio de Janeiro</option>
                                                    <option value="Vitória" data-estado="ES">Vitória</option>
                                                </select>
                                                <div id="error-cidade-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <div class="box-dependente-aabb">
                                                <label for="user_dependente_aabb">Titular ou Dependente?*</label>
                                                <select id="user_dependente_aabb" class="form-control" name="user_dependente_aabb">
                                                    <option value="" selected="selected">-</option>
                                                    <option value="Titular">Titular</option>
                                                    <option value="Dependente">Dependente</option>
                                                </select>
                                                <div id="error-dependente" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="box-nome-titular-aabb">
                                                <label for="nome-titular-aabb">Digite o nome do titular da cota</label>
                                                <input class="form-control" type="text" id="nome-titular-aabb" name="nome-titular-aabb" placeholder="">
                                                <div id="error-nome-titular-aabb" class="invalid-feedback">
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