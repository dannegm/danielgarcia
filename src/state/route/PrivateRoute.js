import React from 'react';
import { Route, Navigate } from 'react-router-dom';

// import useAuth from '@hooks/useAuth';

// eslint-disable-next-line react/prop-types
const PrivateRoute = ({ element: Component, ...rest }) => {
    // const { isLoading, isAuthorized } = useAuth();

    const isLoading = false;
    const isAuthorized = false;

    if (isLoading) {
        return <></>;
    }

    return (
        <Route
            {...rest}
            element={(props) =>
                !isAuthorized ? <Navigate replace to='/secret/login' /> : <Component {...props} />
            }
        />
    );
};

export default PrivateRoute;
