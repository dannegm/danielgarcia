import React from 'react';
import { Redirect } from 'react-router-dom';

import useAuth from '@/shared/hooks/useAuth';

import LoginScreen from './components/LoginScreen';
import UnauthorizedScreen from './components/UnauthorizedScreen';

const Login = () => {
    const {
        isAuthorized,
        hasSession,
        user,
        requestLogin,
        requestLogout,
    } = useAuth();

    if (!hasSession) {
        return <LoginScreen requestLogin={requestLogin} />;
    }

    if (hasSession && !isAuthorized) {
        return (
            <UnauthorizedScreen
                requestLogin={requestLogin}
                requestLogout={requestLogout}
                user={user}
            />
        );
    }

    return <Redirect to='/secret' />;
};

export default Login;
