# 📺 TVCast Platform

O **TVCast** é uma plataforma de streaming de alta performance, projetada para centralizar o acesso a conteúdos multimídia com uma experiência de usuário imersiva (estilo Netflix) e uma camada de curadoria inteligente movida a IA.

> **Status:** Em Desenvolvimento (MVP)
> **Stack:** Monorepo (Laravel, React, Docker)

## 🚀 O Projeto
O TVCast resolve a dificuldade de consumir listas estáticas de IPTV através de uma interface moderna e inteligente. Ao invés de requisições diretas, o sistema sincroniza os dados via Jobs em background, garantindo uma navegação fluida, cache otimizado e uma curadoria que aprende com os hábitos do usuário.

## 🏗️ Stack Tecnológica

*   **Backend:** [Laravel 11.x](https://laravel.com/) (PHP 8.3+) - Arquitetura modular com API RESTful robusta.
*   **Frontend:** [React](https://react.dev/) + [Vite](https://vitejs.dev/) + [TypeScript](https://www.typescriptlang.org/) - Design focado em performance e componentes reutilizáveis.
*   **Infraestrutura:** [Docker](https://www.docker.com/) & [Docker Compose](https://docs.docker.com/compose/) - Ambiente de desenvolvimento e produção padronizado.
*   **Banco de Dados/Cache:** MySQL 8.0 & Redis - Armazenamento relacional e filas de alta velocidade para tarefas de sincronização.
*   **Inteligência Artificial:** Integração via API de LLMs (OpenAI/Anthropic) para motor de recomendações e análise de metadados.

## 🛠️ Arquitetura e Diferenciais

- **Sincronização Inteligente:** Jobs agendados realizam o *diff* da base de dados, minimizando o tráfego de rede e garantindo que o front-end sempre consuma dados locais em cache.
- **Estrutura Monorepo:** Organização via [Turborepo](https://turbo.build/), facilitando a escala para novos módulos (Web, App, ou TV).
- **IA e Curadoria:** Sistema híbrido de recomendação que combina notas críticas, tendências de redes sociais e histórico pessoal.
- **Design "TV-Ready":** Interface desenvolvida pensando em acessibilidade e navegação por controle remoto (D-Pad).

## 🚦 Como Rodar Localmente

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/SEU_USUARIO/tvcast-platform.git
   cd tvcast-platform
   ```

2. **Suba os containers:**
   ```bash
   docker-compose up -d --build
   ```

3. **Configure as variáveis de ambiente:**
   Copie os arquivos `.env.example` para `.env` nas pastas `/apps/api` e `/apps/web` e preencha as configurações necessárias.

4. **Instale as dependências e rode as migrations:**
   ```bash
   docker-compose exec api composer install
   docker-compose exec api php artisan migrate
   ```

## 📈 Metas de Portfólio
Este projeto demonstra domínio em:
- [x] Clean Architecture & Design Patterns.
- [x] Containerização com Docker Compose.
- [x] Engenharia de dados e sistemas de cache.
- [x] Desenvolvimento de interfaces SPA com alta performance.

---
*Desenvolvido como parte do meu plano de especialização em arquitetura web e integração de IA.*