import React, { Suspense } from 'react';
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Redirect,
} from 'react-router-dom';

import { Loading } from './RouterHandler.styled';

import routes from './routes';

const RouteHandler = () => (
    <Router>
        <Suspense fallback={<Loading />}>
            <Switch>
                {routes.map((route) => (
                    <Route key={`root.${route.name}`} {...route} />
                ))}
                <Route component={() => <Redirect to="/404" />} />
            </Switch>
        </Suspense>
    </Router>
);
export default RouteHandler;
