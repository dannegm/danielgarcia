import React from 'react';

import { Container, Menu } from 'semantic-ui-react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';

import {
    Page,
    Background,
    Overlay,
    Hero,
    MenuWrapper,
    TransparentMenu,
} from './Home.styled';

const Home = () => {
    useDocumentTitle('Hello!, I’m Daniel García');

    return (
        <Page>
            <Background>
                <Galaxy />
            </Background>
            <Overlay>
                <Container>
                    <MenuWrapper>
                        <TransparentMenu size='huge' widths={4}>
                            <Menu.Item link>Labs</Menu.Item>
                            <Menu.Item as='a' href='/blog' link>
                                Blog
                            </Menu.Item>
                            <Menu.Item link>Contact</Menu.Item>
                            <Menu.Item link>About</Menu.Item>
                        </TransparentMenu>
                    </MenuWrapper>
                    <Hero>
                        <img
                            src='https://graph.facebook.com/2800131720206407/picture?type=large'
                            alt='Avatar of Daniel García'
                        />
                        <h1>Hello!, I’m Daniel García.</h1>
                    </Hero>
                </Container>
            </Overlay>
        </Page>
    );
};

export default Home;
