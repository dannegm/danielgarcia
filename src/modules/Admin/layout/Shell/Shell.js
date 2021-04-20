import React from 'react';
import { Container, Menu, Icon } from 'semantic-ui-react';

import useAuth from '@/shared/hooks/useAuth';

import { Page, Avatar } from './Shell.styled';

const Shell = ({ children }) => {
    const { user, requestLogout } = useAuth();

    return (
        <Page>
            <Container>
                <Menu>
                    <Menu.Item>
                        <Avatar src={user.photoURL} alt='' />
                    </Menu.Item>
                    <Menu.Item name='home' color='red'>
                        Inicio
                    </Menu.Item>
                    <Menu.Item name='avatars'>Avatares</Menu.Item>
                    <Menu.Item name='articles'>Artículos</Menu.Item>

                    <Menu.Item
                        position='right'
                        name='logout'
                        onClick={requestLogout}
                    >
                        <Icon name='log out' />
                    </Menu.Item>
                </Menu>

                {children}
            </Container>
        </Page>
    );
};

export default Shell;
