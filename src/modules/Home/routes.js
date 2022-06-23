import { lazy } from 'react';

const Home = lazy(() => import('./Home'));
const Avatar = lazy(() => import('./Avatar'));

const exact = true;

const routes = [
    {
        name: 'home',
        path: '/',
        Element: Home,
        exact,
    },
    {
        name: 'avatar',
        path: '/avatar/:avatarKey',
        Element: Avatar,
        exact,
    },
];

export default routes;
