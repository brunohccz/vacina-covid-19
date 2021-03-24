function page(path) {
    return () => import(`@/views/${path}`);
}

export default [
    {
        path: "/app",
        component: { render: h => h("router-view") },
        children: [
            {
                path: "",
                name: "app.home",
                component: page("app/home")
            },
            {
                path: "/patient",
                component: { render: h => h("router-view") },
                children: [
                    {
                        path: "",
                        name: "app.patient",
                        component: page("app/patient/index")
                    },
                    {
                        path: "create",
                        name: "app.patient.create",
                        component: page("app/patient/create")
                    },
                    {
                        path: ":id",
                        name: "app.patient.edit",
                        component: page("app/patient/edit")
                    }
                ]
            },
            {
                path: "/vaccine",
                component: { render: h => h("router-view") },
                children: [
                    {
                        path: "",
                        name: "app.vaccine",
                        component: page("app/vaccine/index")
                    },
                    {
                        path: "create",
                        name: "app.vaccine.create",
                        component: page("app/vaccine/create")
                    },
                    {
                        path: ":id",
                        name: "app.vaccine.edit",
                        component: page("app/vaccine/edit")
                    }
                ]
            },
            {
                path: "vaccinate/:patient?",
                name: "vaccinate",
                component: page("app/vaccinate")
            }
        ]
    },
    {
        path: "/",
        name: "landing",
        component: page("landing")
    }
];
