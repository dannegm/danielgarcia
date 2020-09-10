import { lazy } from 'react';

const Home = lazy(() => import(/* webpackChunkName: "home" */ './Home'));

const exact = true;

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        exact,
    },
];

export default routes;
