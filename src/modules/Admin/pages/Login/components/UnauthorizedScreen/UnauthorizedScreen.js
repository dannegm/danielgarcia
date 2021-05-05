import React from 'react';
import PropTypes from 'prop-types';

import { Button } from '@blueprintjs/core';

import {
    PageWrapper,
    AvatarWrapper,
    Avatar,
    Title,
    Description,
    Code,
    Purple,
} from './UnauthorizedScreen.styled';

const UnauthorizedScreen = ({ user, requestLogin, requestLogout }) => {
    return (
        <PageWrapper>
            <AvatarWrapper>
                <Avatar src={user.photoURL} />
            </AvatarWrapper>
            <Title>Bienvenido</Title>
            <Description>
                No tienes permisos para acceder al <Purple>dashboard</Purple>,
                <br />
                proporciona el siguiente código a tu administrador para obtener
                acceso.
            </Description>
            <Code>{user.uid}</Code>
            <Button large intent='danger' onClick={() => requestLogin()}>
                Cambiar de cuenta
            </Button>
            <Button large minimal onClick={() => requestLogout()}>
                Cerrar sesión
            </Button>
        </PageWrapper>
    );
};

UnauthorizedScreen.propTypes = {
    user: PropTypes.shape({
        uid: PropTypes.string.isRequired,
        photoURL: PropTypes.string.isRequired,
    }).isRequired,
    requestLogin: PropTypes.func.isRequired,
    requestLogout: PropTypes.func.isRequired,
};

export default UnauthorizedScreen;
