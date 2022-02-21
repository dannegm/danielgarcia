import { lazy } from 'react';

const Home = lazy(() => import(/* webpackChunkName: "home" */ './Home'));
const Avatar = lazy(() => import(/* webpackChunkName: "Avatar" */ './Avatar'));

const exact = true;

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        exact,
    },
    {
        name: 'avatar',
        path: '/avatar/:avatarKey',
        component: Avatar,
        exact,
    },
];

export default routes;
