import React from 'react';
import { Route, Redirect } from 'react-router-dom';

import useAuth from '@/shared/hooks/useAuth';

const PrivateRoute = ({ component: Component, ...rest }) => {
    const { isLoading, isAuthorized } = useAuth();

    if (isLoading) {
        return <></>;
    }

    return (
        <Route
            {...rest}
            render={(props) =>
                !isAuthorized ? (
                    <Redirect to="/secret/login" />
                ) : (
                    <Component {...props} />
                )
            }
        />
    );
};

export default PrivateRoute;
