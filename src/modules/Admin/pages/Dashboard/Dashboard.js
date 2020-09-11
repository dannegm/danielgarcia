import React from 'react';
import { Container, Menu, Icon } from 'semantic-ui-react';

import { Page, Avatar } from './Dashboard.styled';

import useAuth from '@/shared/hooks/useAuth';

const Dashboard = () => {
    const { user, requestLogout } = useAuth();

    return (
        <Page>
            <Container>
                <Menu>
                    <Menu.Item>
                        <Avatar src={user.photoURL} alt="" />
                    </Menu.Item>
                    <Menu.Item name="home" color="red">
                        Inicio
                    </Menu.Item>
                    <Menu.Item name="avatars">Avatares</Menu.Item>
                    <Menu.Item name="articles">Artículos</Menu.Item>

                    <Menu.Item
                        position="right"
                        name="logout"
                        onClick={requestLogout}
                    >
                        <Icon name="log out" />
                    </Menu.Item>
                </Menu>
            </Container>
        </Page>
    );
};

export default Dashboard;
