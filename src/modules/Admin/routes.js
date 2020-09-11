import React, { lazy } from 'react';
import { Redirect } from 'react-router-dom';

const Login = lazy(() =>
    import(/* webpackChunkName: "admin.login" */ './pages/Login')
);
const Dashboard = lazy(() =>
    import(/* webpackChunkName: "admin.dashboard" */ './pages/Dashboard')
);

const exact = true;
const auth = true;

const routes = [
    {
        name: 'admin.root',
        path: '/secret',
        component: () => <Redirect to='/secret/login' />,
        exact,
    },
    {
        name: 'admin.login',
        path: '/secret/login',
        component: Login,
        exact,
    },
    {
        name: 'admin.dasboard',
        path: '/secret/dasboard',
        component: Dashboard,
        exact,
        auth,
    },
];

export default routes;
