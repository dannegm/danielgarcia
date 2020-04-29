import React from 'react'
import PushLocation from './components/PushLocation'

import Home from '@/pages/Home'

const exact = true

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        exact,
    },
    {
        name: 'projects.nyungerland',
        path: '/nyungerland',
        component: () => <PushLocation to={'https://nyungerland.net/'} />,
        exact,
    }
]

export default routes