import React from 'react';

import { Container } from 'semantic-ui-react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';

import {
    Page,
    Background,
    Overlay,
    Hero,
} from './Home.styled';

import avatare_covid19 from '@/assets/images/avatares/avatare-covid19.png';

const Home = () => {
    useDocumentTitle('Hello!, I’m Daniel García');

    return (
        <Page>
            <Background>
                <Galaxy />
            </Background>
            <Overlay>
                <Container>
                    <Hero>
                        <img
                            src={avatare_covid19}
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
