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
                    <Route
                        key={route.name}
                        path={route.path}
                        component={route.component}
                        exact
                    />
                ))
            }
        </Switch>
    </Router>
)

export default RouteHandler
