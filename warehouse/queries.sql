####################Exploring the DB########################

select fornecedor.nome, fornecedor.nif_forn, data
from fornecedor, primario
where fornecedor.nif_forn = primario.nif_forn 	
	order by data DESC;

select corredor.num, largura 
from corredor 
	inner join produto 
	inner join localizado 
	on produto.cod = localizado.cod 
	on corredor.nif = localizado.nif;

select produto.nome_marca, count(nif_forn) as num_forn_secun
from produto natural join localizado natural join supermercado natural join secundario
where supermercado.nome = 'Jaquina´s Gourmet' 
group by nome_marca;

select supermercado.nome
    from supermercado natural join localizado
    group by supermercado.nome
    having count(cod)>= all (
    	select count(localizado.cod)
    	from supermercado natural join localizado
   		group by supermercado.nome);


select supermercado.nome as supermercados 
from supermercado natural join prateleira
where (num,nif,lado,altura) not in(
	select num,nif,lado,altura 
	from supermercado natural join localizado);

