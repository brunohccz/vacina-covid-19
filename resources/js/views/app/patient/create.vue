<template>
    <div id="page-form" class="container">
        <page-header title="Cadastro de paciente." />
        <main>
            <form>
                <fieldset>
                    <legend>Dados pessoais</legend>

                    <div class="input-block">
                        <label for="name">Nome completo</label>
                        <input type="text" id="name" />
                    </div>

                    <div class="input-block">
                        <label for="birthday">Nascimento</label>
                        <input type="date" id="birthday" />
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
