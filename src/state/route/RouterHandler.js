import React, { Suspense } from 'react';
import { BrowserRouter as Router, Route, Routes, Navigate } from 'react-router-dom';

import { Loading } from './RouterHandler.styled';
import routes from './routes';

const RouterHandler = () => (
    <Router>
        <Suspense fallback={<Loading />}>
            <Routes>
                {routes.map((route) => (
                    <Route
                        key={`root.${route.name}`}
                        path={route.path}
                        element={<route.Element />}
                    />
                ))}
                <Route path='*' replace element={<Navigate replace to='/404' />} />
            </Routes>
        </Suspense>
    </Router>
);
export default RouterHandler;
