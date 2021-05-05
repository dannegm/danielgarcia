import React, { lazy } from 'react';
import { Redirect } from 'react-router-dom';

const Login = lazy(() =>
    import(/* webpackChunkName: "admin.login" */ './pages/Login')
);
const Logout = lazy(() =>
    import(/* webpackChunkName: "admin.logout" */ './pages/Logout')
);

const Avatars = lazy(() =>
    import(/* webpackChunkName: "admin.avatars" */ './pages/Avatars')
);
const Users = lazy(() =>
    import(/* webpackChunkName: "admin.users" */ './pages/Users')
);

const exact = true;
const auth = true;

const routes = [
    {
        name: 'admin',
        path: '/secret',
        component: () => <Redirect to='/secret/avatars' />,
        exact,
    },
    {
        name: 'admin.login',
        path: '/secret/login',
        component: Login,
        exact,
    },
    {
        name: 'admin.logout',
        path: '/secret/logout',
        component: Logout,
        exact,
        auth,
    },
    {
        name: 'admin.avatars',
        path: '/secret/avatars',
        component: Avatars,
        exact,
        auth,
    },
    {
        name: 'admin.users',
        path: '/secret/users',
        component: Users,
        exact,
        auth,
    },
];

export default routes;
