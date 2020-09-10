import React, { Suspense } from 'react';
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Redirect,
} from 'react-router-dom';

import routes from './routes';

const Loader = () => <div>Cargando...</div>;

const RouteHandler = () => (
    <Router>
        <Suspense fallback={<Loader />}>
            <Switch>
                {routes.map((route) => (
                    <Route key={`root.${route.name}`} {...route} />
                ))}
                <Route component={<Redirect to="/404" />} />
            </Switch>
        </Suspense>
    </Router>
);
export default RouteHandler;
