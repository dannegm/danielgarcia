import React from 'react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import { Page } from './Home.styled';

const Home = () => {
    useDocumentTitle('Home');

    return (
        <Page>
            <h1>Hello!</h1>
            <h2>I&apos;m Daniel Garc&itilde;a</h2>
        </Page>
    );
};

export default Home;
