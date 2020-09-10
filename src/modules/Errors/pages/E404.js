import React from 'react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import { Page } from './E404.styled';

const E404 = () => {
    useDocumentTitle('404 - Not Found');

    return (
        <Page>
            <h1>404</h1>
            <h2>Nothing to find here</h2>
        </Page>
    );
};

export default E404;
