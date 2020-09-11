import { lazy } from 'react';

const Blog = lazy(() => import(/* webpackChunkName: "blog" */ './Blog'));

const exact = true;

const routes = [
    {
        name: 'blog',
        path: '/blog',
        component: Blog,
        exact,
    },
];

export default routes;
