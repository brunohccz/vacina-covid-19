<template>
    <div id="page-form" class="container">
        <page-header
            title="Vacinação"
            description="Oba! mais um paciente será vacinado."
        />
        <main>
            <form>
                <fieldset>
                    <legend>Vacinação</legend>

                    <div class="select-block">
                        <label for="patient">Paciente</label>
                        <select id="patient">
                            <option
                                v-for="n in 30"
                                :key="n"
                                value=""
                                disabled
                                selected
                            >
                                Selecione
                            </option>
                        </select>
                    </div>

                    <div class="select-block">
                        <label for="vaccine">Vacina</label>
                        <select id="vaccine">
                            <option disabled selected>
                                Selecione
                            </option>
                        </select>
                    </div>
                </fieldset>
                <footer>
                    <div></div>
                    <button type="submit">
                        Vacinar
                    </button>
                </footer>
            </form>
        </main>
    </div>
</template>
