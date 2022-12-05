select nome_usuario, nome_categoria
from tb_categoria
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario

select nome_usuario, nome_empresa, telefone_empresa, endereco_empresa
from tb_empresa
inner join tb_usuario
on tb_empresa.id_usuario = tb_usuario.id_usuario

select nome_usuario, banco_conta, saldo_conta, numero_conta, email_usuario
from tb_conta
inner join tb_usuario
on tb_conta.id_usuario = tb_usuario.id_usuario

select data_movimento, tipo_movimento, valor_movimento, nome_usuario
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario

select data_movimento, tipo_movimento, valor_movimento, nome_usuario, nome_categoria
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria

select nome_categoria, nome_empresa, nome_usuario, data_movimento, valor_movimento, email_usuario
from tb_movimento
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria
inner join tb_empresa
on tb_movimento.id_empresa = tb_empresa.id_empresa
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario

select banco_conta, numero_conta, nome_categoria, nome_empresa, nome_usuario, data_movimento, valor_movimento
from tb_movimento
inner join tb_conta
on tb_movimento.id_conta = tb_conta.id_conta
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria
inner join tb_empresa
on tb_movimento.id_empresa = tb_empresa.id_empresa
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario


