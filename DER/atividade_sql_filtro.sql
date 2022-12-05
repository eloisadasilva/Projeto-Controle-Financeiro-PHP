select nome_usuario, nome_categoria
from tb_categoria
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario
where nome_usuario like '%a%'


select nome_usuario, nome_categoria, tb_categoria.id_usuario
from tb_categoria
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario
where tb_categoria.id_usuario = 1


select nome_categoria, 
	   nome_empresa, 
       nome_usuario, 
       data_movimento, 
       valor_movimento
from tb_movimento
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.id_categoria
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.id_usuario
where tipo_movimento = 1

select banco_conta, 
	   numero_conta, 
       nome_categoria, 
       nome_empresa, 
       nome_usuario, 
       data_movimento, 
       valor_movimento,
       tb_movimento.id_usuario
from tb_movimento
inner join tb_conta
on tb_conta.id_conta = tb_movimento.id_conta
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.id_categoria
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.id_usuario
where tipo_movimento = 1 
and tb_movimento.id_usuario between 1 and 2


select banco_conta, 
	   numero_conta, 
       nome_categoria, 
       nome_empresa, 
       nome_usuario, 
       data_movimento, 
       valor_movimento
from tb_movimento
inner join tb_conta
on tb_conta.id_conta = tb_movimento.id_conta
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.id_categoria
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.id_usuario
where data_movimento between '2020-01-01' and '2022-06-29'

