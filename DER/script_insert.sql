-- COMANDO PARA INSERIR INFORMAÇÃO 
-- insert into nome_tabela (colunas) values (valores)

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
value
('Eloisa', 'eloisadasilva.es@gmail.com', 'senha123', '2022-06-22');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
value
('Ana Maria','ana@gmail.com', 'senha123', '2022-06-22');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
value
('Alexandre','alexandre@gmail.com', 'senha123', '2022-06-22');


insert into tb_categoria
(nome_categoria, id_usuario)
values
('Alimentação', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Viagens', 2);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa Colchões', '43999751111', 'Rua dos Colchões', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa Comer Bem', '43999854444', 'Rua dos Restaurantes', 2)

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Lojas Americanas', null, null, 1)

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '1122', '112233', 4500.20, 1);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', '4433', '335566', 5678.89, 2);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-22', 45, NULL, 1, 2, 1, 1);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-22', 34.12, 'Pagamento adiantado', 2, 2, 2, 2);


insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
value
('Maria Silva','maria@gmail.com', 'maria123', '2022-06-22');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Antonio Souza', 'antonio_souza@gmail.com', 'antonio456', '2022-06-21');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Beatriz Oliveira', 'beatriz@hotmail.com', 'beatriz321', '2022-06-20');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Rodrigo Pereira', 'rodrigo.pereira@hotmail.com', 'rodrigo456', '2022-06-19');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Bruna Santos', 'bruna.santos@gmail.com', 'santos123', '2022-06-20');

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Supermercado Muffato', '4333659999', 'Av. Duque de Caxias', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Farmácia Nissei', '4333859889', 'Av. Bandeirantes', 4);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Supermercado Viscard', '4333659888', 'Av. Bandeirantes', 5);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Farmácia Panvel', '4333449779', 'Av. Bandeirantes', 5);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Restaurante Galpão Nelore', '4333659888', 'Av. Higienópolis', 6);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Hospital Materdei', '4333449779', 'Av. Souza Naves', 6);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('McDonalds', '4333759778', 'Av. Higienópolis', 7);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Loja Riachuelo', '4333449779', 'Av. Souza Naves', 7);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Hospital Evangélico', '4339998762', 'Av. Bandeirantes', 8);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Arezo', '4333569991', 'Rua Sergipe', 8);



insert into tb_categoria
(nome_categoria, id_usuario)
values
('Alimentação', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Farmácia', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Salário', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Alimentação', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Salário', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Renda Extra', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Saúde', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Salário', 7);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Roupas', 7);


insert into tb_categoria
(nome_categoria, id_usuario)
values
('Serviços prestados', 8);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Calçados', 8);


insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Banco do Brasil', '1163', '8989569', 5050.60, 4);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Caixa Econômica', '2163', '9632144', 500, 4);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Sicredi', '2263', '7745633', 1555.78, 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '4113', '8932145', 800, 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Caixa Econômica', '2263', '7745633', 900, 6);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '5188', '1782165', 850, 6);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Caixa Econômica', '2263', '7745633', 100, 7);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itaú', '2523', '9992164', 50, 7);


insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', '7452', '7893257', 2587.58, 8);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itaú', '8899', '874632', 1582.92, 8);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-05', 2000, 'Salário referente ao mês de maio', 3, 5, 4, 4);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-10', 500, null, 4, 4, 3, 4);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-05', 2000, 'Salário referente ao mês de maio', 6, 7, 5, 5);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-15', 500, null, 5, 6, 6, 5);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-05', 1500, 'Serviço extra de garçonete', 7, 8, 7, 6);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-20', 15000, 'Cirurgia', 8, 9, 8, 6);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-05', 1350, 'Salário do mês de maio', 9, 10, 10, 7);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-15', 200, null, 10, 11, 9, 7);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(1, '2022-06-19', 5580, 'Serviço de reparos em equipamentos', 11, 12, 11, 8);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_categoria, id_conta, id_usuario)
values
(2, '2022-06-22', 650, null, 12, 13, 12, 8);
