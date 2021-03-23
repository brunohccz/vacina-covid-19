<template>
    <div id="page-form" class="container">
        <page-header
            title="Cadastro de vacina."
            description="Preencha todos os dados com atenção!"
        />
        <main>
            <form>
                <fieldset>
                    <legend>Dados</legend>

                    <div class="input-block">
                        <label for="name">Fabricante</label>
                        <input type="text" id="name" />
                    </div>

                    <div class="input-block">
                        <label for="name">Lote</label>
                        <input type="text" id="name" />
                    </div>

                    <div class="input-block">
                        <label for="name">Data de validade</label>
                        <input type="date" id="name" />
                    </div>

                    <div class="input-block">
                        <label for="name">Doses</label>
                        <input type="number" id="name" />
                    </div>

                    <div class="input-block">
                        <label for="name">Intervalo mínimo entre doses</label>
                        <input type="number" id="name" />
                    </div>
                </fieldset>
                <footer>
                    <p>
                        <img
                            src="/images/icons/warning.svg"
                            alt="Aviso importante"
                        />
                        Importante! <br />
                        Preencha todos os dados
                    </p>
                    <button type="submit">
                        Cadastrar
                    </button>
                </footer>
            </form>
        </main>
    </div>
</template>
