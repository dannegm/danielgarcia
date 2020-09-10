import React from 'react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';

import { Page, Background, Overlay } from './Home.styled';

const Home = () => {
    useDocumentTitle('Home');

    return (
        <Page>
            <Overlay>
                <img
                    src="https://graph.facebook.com/2800131720206407/picture?type=large"
                    alt="Avatar of Daniel García"
                />
                <h1>Hello!, I&apos;m Daniel García.</h1>
            </Overlay>
            <Background>
                <Galaxy />
            </Background>
        </Page>
    );
};

export default Home;
