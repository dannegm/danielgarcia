import React from 'react';

import { Redirect } from 'react-router-dom';

import { Icon } from 'semantic-ui-react';

import useAuth from '@/shared/hooks/useAuth';

import {
    LoginWrapper,
    LoginAvatarIcon,
    LoginAvatarImg,
    LoginTitle,
    LoginDescription,
    LoginToken,
    BlueText,
    PurpleText,
    LoginButtonAction,
    LoginButtonLink,
} from './Login.styled';

const LoginScreen = ({ requestLogin }) => {
    return (
        <LoginWrapper>
            <LoginAvatarIcon>
                <Icon name='user secret' size='big' />
            </LoginAvatarIcon>
            <LoginTitle>Dashboard</LoginTitle>
            <LoginDescription>
                Inicia sesión con tu cuenta de <BlueText>Google</BlueText> para
                acceder al <PurpleText>dashboard</PurpleText>.
            </LoginDescription>

            <LoginButtonAction
                color='google plus'
                onClick={() => requestLogin()}
            >
                <Icon name='google' /> Inicia con Google
            </LoginButtonAction>
        </LoginWrapper>
    );
};

const UnauthorizedScreen = ({ user, requestLogin, requestLogout }) => {
    return (
        <LoginWrapper>
            <LoginAvatarImg>
                <img src={user.photoURL} alt='' />
            </LoginAvatarImg>
            <LoginTitle>Bienvenido</LoginTitle>
            <LoginDescription>
                No tienes permisos para acceder al{' '}
                <PurpleText>dashboard</PurpleText>,
                <br />
                proporciona el siguiente código a tu administrador para obtener
                acceso.
            </LoginDescription>

            <LoginToken>{user.uid}</LoginToken>

            <LoginButtonAction
                color='google plus'
                onClick={() => requestLogin()}
            >
                <Icon name='google' /> Cambiar de cuenta
            </LoginButtonAction>

            <LoginButtonLink onClick={() => requestLogout()} basic>
                Cerrar sesión
            </LoginButtonLink>
        </LoginWrapper>
    );
};

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

    return <Redirect to='/secret/dasboard' />;
};

export default Login;
