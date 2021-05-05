import React from 'react';
import PropTypes from 'prop-types';

import { Button, Icon } from '@blueprintjs/core';

import {
    PageWrapper,
    IconWrapper,
    Title,
    Description,
    Red,
    Purple,
} from './LoginScreen.styled';

const LoginScreen = ({ requestLogin }) => {
    return (
        <PageWrapper>
            <IconWrapper>
                <Icon icon='new-grid-item' iconSize='1.5rem' />
            </IconWrapper>
            <Title>Dashboard</Title>
            <Description>
                Inicia sesión con tu cuenta de <Red>Google</Red> para acceder al{' '}
                <Purple>dashboard</Purple>.
            </Description>
            <Button large intent='danger' onClick={() => requestLogin()}>
                Inicia con Google
            </Button>
        </PageWrapper>
    );
};

LoginScreen.propTypes = {
    requestLogin: PropTypes.func.isRequired,
};

export default LoginScreen;
