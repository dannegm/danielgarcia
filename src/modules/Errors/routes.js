import { lazy } from 'react';

const E404 = lazy(() =>
    import(/* webpackChunkName: "error.404" */ './pages/E404')
);

const exact = true;

const routes = [
    {
        name: 'error.404',
        path: '/404',
        component: E404,
        exact,
    },
];

export default routes;
