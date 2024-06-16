# Ambiente de Ensino de Estrutura de Dados - Manual de Instalação

Este manual foi elaborado para guiar você na instalação e configuração de uma aplicação web utilizando apenas o XAMPP. O XAMPP é um pacote de software gratuito que inclui o Apache (servidor web), MySQL (sistema de gerenciamento de banco de dados) e PHP (linguagem de programação), tornando-o uma ferramenta ideal para desenvolvimento e teste de aplicações web em um ambiente local.

## Objetivo

O objetivo deste manual é fornecer um passo a passo detalhado que permita a instalação, configuração, verificação, manutenção e eventual desinstalação da aplicação web de forma simples e eficiente. Seguindo este guia, mesmo aqueles com pouca experiência em administração de servidores e gerenciamento de banco de dados poderão configurar a aplicação com sucesso.

## Estrutura do Manual

O manual está dividido em seções que cobrem todos os aspectos do processo de instalação e configuração:

1. **Requisitos do Sistema**: Lista os requisitos de hardware e software necessários para a instalação da aplicação.
2. **Preparação do Ambiente**: Instruções para a instalação de ferramentas necessárias como Git e XAMPP.
3. **Download e Instalação da Aplicação**: Passos para clonar o repositório da aplicação e mover os arquivos para o diretório do servidor web.
4. **Configuração Inicial**: Orientações para iniciar o XAMPP, configurar o banco de dados no phpMyAdmin e alterar o arquivo de configuração da aplicação para conectar ao banco de dados local.
5. **Verificação e Testes**: Procedimentos para acessar a aplicação no navegador e verificar se todas as funcionalidades estão operando corretamente.
6. **Solução de Problemas**: Soluções para problemas comuns que podem ocorrer durante a instalação e configuração.
7. **Atualização e Manutenção**: Instruções para atualizar a aplicação e realizar backups regulares.
8. **Desinstalação**: Passos para remover a aplicação e o banco de dados do sistema.

## Público-Alvo

Este manual é destinado a desenvolvedores web, administradores de sistemas, estudantes de tecnologia da informação e qualquer pessoa interessada em configurar uma aplicação web localmente usando XAMPP. Conhecimentos básicos em Git, PHP e MySQL são recomendados, mas não indispensáveis, pois o manual fornece instruções detalhadas para cada etapa.

## Manual de Instalação (Configuração) da Aplicação Web

### 1. Requisitos do Sistema

**Hardware Necessário**
- CPU: Dual-core ou superior
- RAM: 4 GB ou superior
- Espaço em Disco: 500 MB ou mais para a aplicação e dependências

**Software Necessário**
- Git
- XAMPP (contendo Apache, MySQL, PHP)
- Navegador Web (Google Chrome, Firefox)

### 2. Preparação do Ambiente

1. **Instalar Git**:
   - Baixe e instale o Git a partir do [site oficial](https://git-scm.com/downloads).

2. **Instalar XAMPP**:
   - Baixe e instale o XAMPP a partir do [site oficial](https://www.apachefriends.org/index.html).

### 3. Download e Instalação da Aplicação

1. **Clonar o Repositório**:
   - Abra o terminal (ou Git Bash) e execute o comando:
     ```bash
     git clone https://github.com/seu-usuario/nome-do-repositorio.git
     ```
   - Navegue até o diretório do repositório clonado:
     ```bash
     cd nome-do-repositorio
     ```

2. **Mover Arquivos para o Diretório do Servidor Web**:
   - Copie os arquivos da aplicação para o diretório `htdocs` do XAMPP:
     ```bash
     cp -r * /caminho/para/xampp/htdocs/seu-projeto
     ```

### 4. Configuração Inicial

1. **Iniciar o XAMPP**:
   - Abra o painel de controle do XAMPP e inicie o Apache e o MySQL.

2. **Configurar o Banco de Dados no phpMyAdmin**:
   - Abra o navegador e acesse `http://localhost/phpmyadmin`.
   - Crie um banco de dados para a aplicação:
     1. Clique em "Bases de dados".
     2. Insira o nome do banco de dados e selecione a intercalação (por exemplo, `utf8_general_ci`).
     3. Clique em "Criar".

3. **Importar Banco de Dados**:
   - Ainda no phpMyAdmin, selecione o banco de dados recém-criado.
   - Clique em "Importar" no menu superior.
   - Clique em "Escolher arquivo" e selecione o arquivo SQL da aplicação.
   - Clique em "Executar".

4. **Alterar Arquivo de Conexão com o Banco de Dados**:
   - Localize o arquivo de configuração da aplicação, geralmente chamado `db.php` ou algo similar dentro do diretório do projeto.
   - Abra este arquivo em um editor de texto.
   - Substitua as credenciais do banco de dados pelas informações do seu banco de dados.
   - Salve o arquivo após realizar as alterações.

### 5. Verificação e Testes

1. **Acessar a Aplicação no Navegador**:
   - Abra o navegador e acesse `http://localhost/EstruturaDeDados`.

2. **Testar Funcionalidades**:
   - Navegue pelas principais funcionalidades da aplicação para garantir que está tudo funcionando corretamente.

### 6. Solução de Problemas

**Erro de Conexão com o Banco de Dados**:
- Verifique se o MySQL está em execução no XAMPP.
- Confirme as credenciais do banco de dados no arquivo de configuração da aplicação.

**Página em Branco ou Erro 500**:
- Verifique os logs de erro do Apache (disponíveis no painel de controle do XAMPP).
- Certifique-se de que todos os arquivos foram copiados corretamente para o diretório `htdocs`.

### 7. Atualização e Manutenção

1. **Atualizar a Aplicação**:
   - Puxe as últimas mudanças do repositório:
     ```bash
     git pull origin main
     ```
   - Aplique as atualizações ao diretório do servidor web conforme necessário.

2. **Backup Regular**:
   - Faça backups regulares do banco de dados e dos arquivos da aplicação.

### 8. Desinstalação

1. **Remover Arquivos da Aplicação**:
   - Exclua o diretório da aplicação do `htdocs`:
     ```bash
     rm -rf /caminho/para/xampp/htdocs/seu-projeto
     ```

2. **Remover Banco de Dados**:
   Exclua o banco de dados usando o phpMyAdmin:
     1. Acesse `http://localhost/phpmyadmin`.
     2. Selecione o banco de dados.
     3. Clique em "Operações" no menu superior.
     4. Clique em "Apagar o banco de dados" e confirme.

## Conclusão

Parabéns! Você concluiu com sucesso a instalação e configuração da aplicação web utilizando o XAMPP. Seguindo este manual, você pôde preparar seu ambiente de desenvolvimento, clonar o repositório da aplicação, configurar o servidor web e o banco de dados, e finalmente testar as funcionalidades da aplicação para garantir que tudo está funcionando conforme esperado.

### Próximos Passos

Agora que a aplicação está instalada e funcionando corretamente, você pode focar nas seguintes atividades:

**Exploração e Desenvolvimento**:
- Explore todas as funcionalidades da aplicação.
- Personalize e desenvolva novas funcionalidades conforme necessário.

**Manutenção Regular**:
- Realize backups regulares do banco de dados e dos arquivos da aplicação.
- Mantenha o XAMPP e as ferramentas de desenvolvimento atualizadas para garantir a segurança e a estabilidade do ambiente.

**Atualizações**:
- Fique atento a novas atualizações da aplicação no repositório.
- Implemente as atualizações conforme descrito na seção de atualização e manutenção deste manual.

**Solução de Problemas e Suporte**:
- Utilize a seção de solução de problemas deste manual para resolver quaisquer questões que possam surgir.
- Participe de comunidades online e fóruns relacionados a XAMPP, PHP e MySQL para suporte adicional e troca de conhecimento.

## Agradecimentos

Agradecemos por utilizar este manual e esperamos que ele tenha sido de grande auxílio para você. Continuaremos a melhorar e atualizar as instruções conforme novas versões das ferramentas e da aplicação sejam lançadas. Sua jornada com o desenvolvimento web está apenas começando e desejamos a você muito sucesso em seus projetos futuros.

Se você encontrar alguma dificuldade ou tiver sugestões para melhorar este manual, não hesite em compartilhar. Seu feedback é muito valioso para nós.

Boa sorte e bom desenvolvimento!

---

Faculdade de Tecnologia de Presidente Prudente - FATEC  
Trabalho de Estrutura de Dados  
João Pedro Garcia Girotto e Manoela Pinheiro da Silva.  
Presidente Prudente – São Paulo, 2024
