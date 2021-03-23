<template>
    <div id="page-list" class="container">
        <page-header title="Gerenciamento de pacientes." />
        <main>
            <div id="create">
                <router-link :to="{ name: 'app.patient.create' }">
                    Cadastrar
                </router-link>
            </div>
            <article class="item small">
                <header>
                    <div>
                        <strong>Bruno Henrique Cerciliar</strong>
                        <span>
                            23 anos
                        </span>
                    </div>
                    <div class="buttons">
                        <a class="edit" href="">Editar</a>
                        <a class="delete" href="">Excluir</a>
                    </div>
                </header>
            </article>
            <article class="item small">
                <header>
                    <div>
                        <strong>Bruno Henrique Cerciliar</strong>
                        <span>
                            23 anos
                        </span>
                    </div>
                    <div class="buttons">
                        <a class="edit" href="">Editar</a>
                        <a class="delete" href="">Excluir</a>
                    </div>
                </header>
            </article>
            <article class="item small">
                <header>
                    <div>
                        <strong>Bruno Henrique Cerciliar</strong>
                        <span>
                            23 anos
                        </span>
                    </div>
                    <div class="buttons">
                        <a class="edit" href="">Editar</a>
                        <a class="delete" href="">Excluir</a>
                    </div>
                </header>
            </article>
        </main>
    </div>
</template>
