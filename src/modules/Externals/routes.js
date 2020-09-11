import React from 'react';
import { Redirect } from 'react-router-dom';

const exact = true;

const routes = [
    {
        name: 'external.nyungerland',
        path: '/nyungerland',
        component: () => <Redirect to='https://nyungerland.net/' />,
        exact,
    },
];

export default routes;
