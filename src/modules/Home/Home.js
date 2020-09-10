import React from 'react';

import { Page } from './Home.styled';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

const Home = () => {
    useDocumentTitle('Home');

    return (
        <Page>
            <h1>Hello!</h1>
            <h2>I'm Daniel García</h2>
        </Page>
    );
};

export default Home;
