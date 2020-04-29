import React from 'react'
import {
    BrowserRouter as Router,
    Switch,
    Route
} from 'react-router-dom'

import routes from './routes'

const RouteHandler = () => (
    <Router>
        <Switch>
            {
                routes.map(route => (
                    <Route key={route.name} {...route} />
                ))
            }
        </Switch>
    </Router>
)

export default RouteHandler
