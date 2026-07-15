# Configuração do agente de IA

Este diretório contém as instruções e os materiais de contexto usados pelos agentes de IA neste projeto.

As rules definem como o agente deve colaborar, interpretar o contexto, executar tarefas e validar alterações.

## Estrutura

```text
.cursor/
├── README.md
├── rules/
│   ├── 100-ai-agent-behavior.mdc
│   ├── 110-ai-context-engineering.mdc
│   └── 120-ai-agent-workflows.mdc
└── templates/
```

## Organização das rules

As rules são mantidas em uma única pasta e usam numeração global por categoria.

O formato dos nomes é:

```text
NNN-categoria-assunto.mdc
```

Exemplo:

```text
120-ai-agent-workflows.mdc
```

A numeração facilita a organização visual e reserva espaço para novas rules. Ela não representa, sozinha, a prioridade de aplicação das instruções.

### Faixas de numeração

|     Faixa | Categoria      | Finalidade                                       |
| --------: | -------------- | ------------------------------------------------ |
| `000–099` | `core`         | Princípios fundamentais do projeto               |
| `100–199` | `ai`           | Comportamento do agente e engenharia de contexto |
| `200–299` | `architecture` | Arquitetura e organização do sistema             |
| `300–399` | `backend`      | Backend, APIs, domínio, dados e integrações      |
| `400–499` | `meta`         | Rules, contexto e manutenção das instruções      |
| `500–599` | `quality`      | Código, testes, revisão e documentação           |
| `600–699` | `security`     | Segurança e proteção de dados                    |
| `700–799` | `frontend`     | Interface e aplicações frontend                  |
| `800–899` | `devops`       | Infraestrutura, CI/CD e deploy                   |
| `900–999` | `operations`   | Operações, releases e manutenção                 |

## Rules atuais

### `100-ai-agent-behavior.mdc`

Define o comportamento geral do agente durante a colaboração.

Abrange:

- interpretação das solicitações;
- hierarquia de contexto;
- leitura do código antes da alteração;
- colaboração com o usuário;
- edição focada de arquivos;
- segurança;
- operações perigosas;
- testes e validação;
- Git e commits;
- tratamento de incertezas;
- formato das respostas.

Esta é uma rule global e deve ser aplicada a todo o projeto.

### `110-ai-context-engineering.mdc`

Define como o agente deve buscar, selecionar e organizar o contexto necessário para uma tarefa.

Abrange:

- camadas de contexto;
- uso de rules, especificações, documentação e código;
- seleção de arquivos relevantes;
- uso de referências `@arquivo` e `@pasta`;
- escrita de solicitações eficazes;
- orçamento de contexto;
- criação e manutenção de rules;
- fonte única de verdade;
- prevenção de contexto excessivo ou contraditório.

Esta é uma rule global, pois seus princípios se aplicam a qualquer tarefa que utilize o agente.

### `120-ai-agent-workflows.mdc`

Define fluxos de trabalho para tarefas que envolvam múltiplas etapas ou maior complexidade.

Abrange:

- exploração;
- planejamento;
- implementação;
- verificação;
- investigação de bugs;
- refatorações;
- alterações em APIs e contratos;
- uso de agentes auxiliares;
- commits;
- critérios de parada;
- formato do resultado final.

Esta rule é contextual e não precisa ser aplicada integralmente a tarefas triviais.

### `200-architecture-clean-architecture-solid.mdc`

Define princípios de organização arquitetural, direção de dependências e aplicação prática de SOLID.

Abrange:

- separação entre apresentação, aplicação, domínio e infraestrutura;
- direção das dependências;
- responsabilidades e restrições de cada camada;
- organização por funcionalidade;
- uso criterioso de `shared/`;
- inversão de dependências;
- interfaces e portas;
- testabilidade;
- sinais de violação arquitetural;
- critérios para criar novas camadas ou pastas.

Esta rule é contextual e se aplica principalmente ao código em `src/` e aos testes. A arquitetura específica já adotada pelo projeto tem prioridade sobre o modelo de referência.

### `210-architecture-module-boundaries.mdc`

Define limites entre módulos, regras de acoplamento e organização de responsabilidades transversais.

Abrange:

- superfície pública dos módulos;
- dependências entre funcionalidades;
- contratos, facades, portas e eventos;
- prevenção de imports profundos;
- dependências circulares;
- uso adequado de `shared/`, `common/` e `core/`;
- autenticação e autorização;
- validação e mapeamento de erros;
- testes de contratos entre módulos;
- sinais de acoplamento excessivo;
- refatoração incremental.

Esta rule é contextual e se aplica principalmente ao código de `src/` e aos testes. A estrutura e os contratos já adotados pelo projeto têm prioridade.

### `010-core-project-principles.mdc`

Define os princípios fundamentais que orientam o agente e as decisões técnicas do projeto.

Abrange:

- papel da IA como parceira técnica;
- respeito à arquitetura e aos padrões existentes;
- análise antes de alterações relevantes;
- critérios para introduzir novas dependências;
- prioridades de qualidade;
- práticas de código a evitar;
- estilo de comunicação;
- planos para tarefas complexas;
- referências ao código;
- atualização de documentação;
- segurança e ações irreversíveis;
- controle de escopo;
- resolução de conflitos entre rules.

Esta é uma rule global e possui alta prioridade. Rules específicas podem detalhar seu comportamento, mas não devem contradizê-la sem justificativa clara.

### `020-core-change-boundaries.mdc`

Define as áreas críticas que não devem ser alteradas sem aprovação explícita.

Abrange:

- CI/CD e pipelines;
- infraestrutura e deploy;
- secrets e credenciais;
- migrations já aplicadas;
- banco de dados;
- contratos públicos de API;
- autenticação e autorização;
- dados de produção;
- releases;
- estratégias incrementais;
- operações destrutivas;
- critérios para solicitar aprovação.

Esta é uma rule global e deve ser aplicada a todo o projeto. Ela protege áreas críticas, mas não substitui revisão humana, branch protection, CI, controle de acesso ou procedimentos de produção.

### `030-core-decision-making.mdc`

Define quando o agente deve perguntar, assumir uma decisão técnica ou apresentar alternativas.

Abrange:

- regras de negócio não documentadas;
- comportamento ambíguo;
- operações destrutivas;
- decisões de segurança e privacidade;
- decisões de produto;
- suposições aceitáveis;
- situações em que não se deve assumir;
- apresentação de alternativas;
- hierarquia para resolver incertezas;
- escalonamento após bloqueios;
- implementação provisória;
- registro de decisões e suposições.

Esta é uma rule global. Seu objetivo é impedir que o agente invente comportamento e avance silenciosamente em decisões com impacto funcional, de segurança ou de compatibilidade.

### `400-meta-rule-authoring.mdc`

Define como criar, revisar, nomear, numerar e manter as rules do Cursor.

Abrange:

- quando criar uma nova rule;
- quando evitar uma nova rule;
- responsabilidade única;
- convenção de nomes;
- numeração global por categoria;
- estrutura do frontmatter;
- uso de `description`, `globs` e `alwaysApply`;
- tamanho e organização interna;
- exemplos;
- verificação de sobreposição;
- resolução de conflitos;
- validação;
- atualização do README;
- manutenção de rules existentes.

Esta rule é contextual e se aplica principalmente a alterações em `.cursor/`. Ela não precisa ser carregada em tarefas comuns de implementação.

### `500-quality-testing-policy.mdc`

Define a política de testes e os critérios mínimos de validação do projeto.

Abrange:

- quando testes são obrigatórios;
- escolha entre testes unitários, de integração, contrato e ponta a ponta;
- uso do framework já configurado;
- testes orientados a comportamento;
- cobertura de caminhos de erro;
- fluxo de teste de regressão para bugs;
- refatorações;
- APIs e contratos;
- persistência e dados;
- operações assíncronas;
- mocks, stubs e fixtures;
- testes determinísticos;
- qualidade mínima;
- regras para CI;
- uso adequado de cobertura;
- tratamento de áreas sem infraestrutura de testes.

Esta rule é contextual e se aplica principalmente a código e testes. As configurações de CI e as convenções já adotadas pelo projeto têm prioridade.

### `600-security-fundamentals.mdc`

Define os fundamentos de segurança aplicáveis a todas as camadas do projeto.

Abrange:

- proteção de secrets e credenciais;
- autenticação;
- autorização;
- validação de entradas;
- prevenção de SQL injection, command injection, XSS e path traversal;
- uploads e manipulação de arquivos;
- tratamento seguro de erros;
- logs e redaction de dados sensíveis;
- dependências e criptografia;
- comunicação segura;
- privacidade e proteção de dados;
- rate limiting e prevenção de abuso;
- testes e validações de segurança;
- alterações sensíveis que exigem aprovação.

Esta é uma rule global de segurança. Rules específicas de API, autenticação, proteção de dados ou infraestrutura podem complementá-la, mas não devem enfraquecer seus fundamentos.

### `610-security-api-security.mdc`

Define controles específicos de segurança para APIs, rotas, controllers, middleware, handlers, funções serverless e webhooks.

Abrange:

- classificação e proteção de endpoints;
- autenticação e autorização;
- validação de requisições;
- minimização de respostas;
- tratamento de erros;
- CORS;
- headers de segurança;
- rate limiting;
- idempotência;
- segurança de webhooks;
- paginação, filtros e ordenação;
- uploads;
- auditoria;
- operações administrativas;
- testes de segurança para APIs;
- alterações sensíveis que exigem aprovação.

Esta rule complementa `600-security-fundamentals.mdc` e é aplicada apenas aos caminhos relacionados à camada de API.

### `620-security-data-protection.mdc`

Define práticas para proteção de dados pessoais, confidenciais e restritos.

Abrange:

- classificação de dados;
- minimização e finalidade;
- senhas, tokens e credenciais;
- armazenamento e criptografia;
- proteção em trânsito;
- logs, métricas e traces;
- erros e respostas;
- retenção;
- exclusão, anonimização e soft-delete;
- backups e réplicas;
- ambientes de desenvolvimento e testes;
- exportações e relatórios;
- compartilhamento com terceiros;
- auditoria;
- incidentes e exposição;
- alterações que exigem aprovação.

Esta rule complementa `600-security-fundamentals.mdc` e `610-security-api-security.mdc`. Ela não substitui políticas internas, contratos, requisitos legais ou avaliação especializada de privacidade.

### `800-devops-git-workflow.mdc`

Define convenções para Git, terminal, branches, commits e operações seguras no repositório.

Abrange:

- detecção do ambiente de terminal;
- escolha de shell e sintaxe;
- preservação de alterações existentes;
- inspeção do estado do Git;
- nomenclatura de branches;
- Conventional Commits;
- commits focados;
- stage seletivo;
- push, merge e rebase;
- operações destrutivas;
- hooks e validações;
- proteção de arquivos sensíveis;
- sugestões de mensagens de commit.

Esta rule é contextual e deve ser aplicada principalmente em tarefas que envolvam Git, terminal, branches, commits, merge, rebase, push ou release.

### `810-devops-ci-pull-requests.mdc`

Define práticas para CI/CD, pipelines e Pull Requests.

Abrange:

- alterações seguras em pipelines;
- preservação de lint, testes, build e verificações de segurança;
- regras condicionais de execução;
- scripts e ferramentas;
- proteção de secrets no CI;
- falhas de pipeline;
- descrição de Pull Requests;
- plano de testes;
- identificação de breaking changes;
- checklist antes do merge;
- implementação incremental de features;
- mudanças de produção e rollback.

Esta rule é contextual e complementa `800-devops-git-workflow.mdc`, `500-quality-testing-policy.mdc` e `020-core-change-boundaries.mdc`.

### `510-quality-spec-driven-development.mdc`

Define um fluxo de desenvolvimento orientado por especificação para tarefas complexas e mudanças de maior risco.

Abrange:

- quando criar uma especificação;
- exploração antes da implementação;
- intenção, escopo e fora do escopo;
- critérios de aceitação;
- suposições e decisões;
- contratos de API e eventos;
- alterações de banco e migrations;
- divisão em tarefas pequenas;
- implementação em fatias verticais;
- verificação baseada em critérios;
- status da especificação;
- atualização da spec durante a implementação;
- anti-padrões de desenvolvimento sem alinhamento.

Esta rule é contextual e complementa `120-ai-agent-workflows.mdc`, `030-core-decision-making.mdc`, `500-quality-testing-policy.mdc` e `020-core-change-boundaries.mdc`.

## Hierarquia de contexto

Em caso de conflito, use esta ordem:

1. Instrução explícita do usuário na mensagem atual.
2. Rules específicas aplicáveis ao arquivo ou diretório.
3. Outras rules do projeto.
4. Arquivos abertos e referências `@`.
5. Especificações aprovadas.
6. Documentação do projeto.
7. Padrões predominantes no código existente.
8. Convenções gerais das rules.

Uma regra específica deve prevalecer sobre uma regra geral, desde que não viole requisitos de segurança ou uma instrução explícita do usuário.

## Escopo das rules

Cada rule deve declarar seu escopo no frontmatter:

```yaml
---
description: Descrição curta da finalidade da rule
globs:
  - 'caminho/**/*.ext'
alwaysApply: false
---
```

Use:

- `alwaysApply: true` para princípios realmente globais;
- `globs` específicos para regras de determinados arquivos ou módulos;
- `alwaysApply: false` para workflows e orientações contextuais.

## Convenções para novas rules

Ao criar uma nova rule:

1. Escolha a categoria correta.
2. Use o próximo número disponível dentro da faixa.
3. Use um nome em `kebab-case`.
4. Escreva a rule em português.
5. Mantenha uma responsabilidade principal por arquivo.
6. Prefira instruções objetivas e verificáveis.
7. Evite repetir regras existentes.
8. Defina corretamente o escopo no frontmatter.
9. Atualize a seção “Rules atuais” deste README.
10. Remova ou atualize rules obsoletas.

## Tamanho recomendado

Como referência:

- prefira menos de 150 linhas por rule;
- evite ultrapassar 500 linhas;
- remova instruções redundantes;
- divida a rule quando ela começar a tratar de assuntos independentes.

O objetivo é fornecer contexto útil, não criar documentação excessiva.

## Fonte única de verdade

Cada informação deve ter um local principal:

- comportamento do agente: `.cursor/rules/`;
- requisitos: `docs/specs/`;
- arquitetura: documentação e ADRs;
- implementação: código;
- formatação: formatter;
- qualidade: linter e CI;
- modelos reutilizáveis: `templates/`.

Não duplique a mesma regra em vários arquivos sem necessidade.

## Manutenção

Ao modificar uma rule:

- preserve sua responsabilidade principal;
- atualize sua descrição quando necessário;
- verifique se ela ainda entra em conflito com outras rules;
- atualize este README se sua finalidade ou escopo mudar.

Ao adicionar uma rule, inclua neste README:

- nome do arquivo;
- finalidade;
- principais responsabilidades;
- escopo de aplicação.
