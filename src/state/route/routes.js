import React from 'react'
import External from './components/External'

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
        name: 'external.nyungerland',
        path: '/nyungerland',
        component: () => <External url={'https://nyungerland.net/'} />,
        exact,
    }
]

export default routes