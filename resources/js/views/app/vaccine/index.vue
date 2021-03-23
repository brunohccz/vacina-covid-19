<template>
    <div id="page-list" class="container">
        <page-header title="Gerenciamento de vacinas." />
        <main>
            <div id="create">
                <router-link :to="{ name: 'app.vaccine.create' }">
                    Cadastrar
                </router-link>
            </div>
            <article class="item small">
                <header>
                    <div>
                        <strong>CORONAVAC</strong>
                        <small>
                            Lote: 1023 | Doses: 1204
                        </small>
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
                        <strong>PFIZER</strong>
                        <small>
                            Lote: 1023 | Doses: 1204
                        </small>
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
