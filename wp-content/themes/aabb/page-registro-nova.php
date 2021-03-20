<?php
get_header();
    
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
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="user_email" maxlength="60" placeholder="E-mail">
                                            <div id="error-email-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-email-invalido" class="invalid-feedback">
                                                Informe um endereço de e-mail válido!
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
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="user_telefone" id="user_telefone" placeholder="Telefone">
                                            <div id="error-telefone-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-telefone-invalido" class="invalid-feedback">
                                                Informe um telefone válido!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="user_data_nascimento" name="user_data_nascimento" placeholder="Data de nascimento">
                                            <div id="error-data_nascimento" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-data-invalido" class="invalid-feedback">
                                                Informe uma data válida!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select id="sexo" class="form-control" name="sexo">
                                                <option value="">Sexo</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                            </select>
                                            <div id="error-sexo" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="user_cpf" name="user_cpf" placeholder="CPF">
                                            <div id="error-cpf-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-cpf-invalido" class="invalid-feedback">
                                                Informe um CPF válido!
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="cidade" maxlength="60" placeholder="Cidade">
                                            <div id="error-cidade" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select id="user_estado" class="form-control" name="user_estado">
                                                <option value="">Estado</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                                <option value="EX">EX</option>
                                            </select>
                                            <div id="error-estado" class="invalid-feedback">
                                                Obrigatório!
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
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="funcionario_bb">É funcionario BB?</label>
                                            <select id="funcionario_bb" class="form-control" name="funcionario_bb">
                                                <option value="Sim">Sim</option>
                                                <option value="Não" selected="selected">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box-matricula-funcionario">
                                                <label for="user_chave_func_bb">Matrícula</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">F</div>
                                                    </div>
                                                    <input type="text" name="user_chave_func_bb" id="user_chave_func_bb" class="form-control">
                                                </div>
                                                <div id="error-matricula-func" class="invalid-feedback">
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

get_footer();