Requisitos:

##Configurando:

Habilite o modo rewrite do apache;
Reinicie o apache;

modifique o seguinte arquivo (em distribuições linux):
"/etc/apache2/sites-enabled/000-default.conf". Adicionando a seguinte informação

<Directory /var/www/html>
    AllowOverride All
 </Directory>

Reinicie o apache novamente.

##Configurando o banco de dados

Dentro da pasta config/db.php inserir as informações de banco de dados, conforme exemplo:

define ("HOST", 'localhost');
define ("USER", 'root');
define ('PASS', 123);
define ("DB", 'prova');

##Modo de usar a api:

utilize a rota: {nomedapasta}/api/tarefa

passar a funcionalidade via get: (adicionar, editar, excluir) 

passar os parametros via get em formato json

ex:

rota?method=adicionar&params={formatojson}

##sql da tabela tarefa

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id` INT(11) ZEROFILL NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `prioridade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;















