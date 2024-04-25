Projeto desenvolvido para a disciplina de 'ARQUITETURA DE SOFTWARE' na Universidade do Vale do Taquari - UNIVATES.

Ferramentas utilizadas:
- PHP
- Composer
- Framework CakePHP 4.x
- MySQL

Link de referência para instalação do Composer:
https://getcomposer.org/

Link de referência para a documentação do CakePHP 4.x:
https://book.cakephp.org/4/pt/index.html

Instalação do projeto:
- Baixar o arquivo .zip
- Extrair os diretórios do projeto
- Dentro da pasta da API principal (projeto-aula-api), você terá o arquivo ```DataModel.sql```, contedo a estrutura das tabelas do banco de dados
- Após criadas as tabelas, ainda dentro da pasta da API principal (projeto-aula-api), preencha os dados do seu banco de dados no arquivo ```app_local.php``` (projeto-aula-api\config\app_local.php)

Para que as API's funcionem, a API principal precisa estar iniciada no servidor de desenvolvimento embutido no CakePHP. A API principal é independente das outras, porém as API's de integração dependem da API principal para funcionarem.
- Para você poder subir esse projeto no servidor de desenvolvimento embutido no CakePHP, execute o seguinte comando no seu terminal (note que você precisa rodar este comando ainda dentro da pasta 'projeto-aula-api'):
  ``` bin/cake server -p 3000 ```
  * Obs.: Aqui você poderá escolher em qual porta quiser subir este projeto, porém, o sistema está configurado para que seja na porta 3000. Caso mude a porta, procure nos controllers os lugares em que é referenciada e altere para a porta de sua escolha.
- Agora dentro dos outros diretórios deste reposiório, os chamados API's de integração, você pode abrir o terminal e executar o seguinte comando: `bin/cake server -p [porta]`
  * Obs.: Para as API's de integração o número da porta que você escolher não é relevante, portanto fique à vontade para escolher a que lhe fizer mais sentido!

Agora que você iniciou o(s) servidor(es) de desenvolvimento com a(s) API(s), você poderá brincar com ela à vontade!
* IMPORTANTE! Para conseguir se comunicar com um endpoint de uma API de integração, você precisa passar como parâmetro no header da requisição o e-mail e a senha de um usuário cadastrado no banco de dados! <br> Exemplos de requisições para endpoints na documentação.
