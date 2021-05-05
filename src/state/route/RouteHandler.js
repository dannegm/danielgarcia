import React, { Suspense } from 'react';
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Redirect,
} from 'react-router-dom';

import PrivateRoute from './PrivateRoute';
import { Loading } from './RouterHandler.styled';
import routes from './routes';

const RouteHandler = () => (
    <Router>
        <Suspense fallback={<Loading />}>
            <Switch>
                {routes.map((route) =>
                    !route.auth ? (
                        <Route key={route.name} {...route} />
                    ) : (
                        <PrivateRoute key={route.name} {...route} />
                    )
                )}
                <Route path='*'>
                    <Redirect to='/404' />
                </Route>
            </Switch>
        </Suspense>
    </Router>
);
export default RouteHandler;
