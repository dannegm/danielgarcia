import { lazy } from 'react';

const E404 = lazy(() => import('./E404'));

const exact = true;

const routes = [
    {
        name: 'error.404',
        path: '/404',
        Element: E404,
        exact,
    },
];

export default routes;
