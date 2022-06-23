import React from 'react';
import PropTypes from 'prop-types';

import RouterHandler from './state/route/RouterHandler';
import GlobalStyle from './shared/styles/GlobalStyle';

const Providers = ({ children }) => {
    return (
        <>
            <GlobalStyle />
            {children}
        </>
    );
};
Providers.propTypes = {
    children: PropTypes.node.isRequired,
};

const App = () => {
    return (
        <Providers>
            <RouterHandler />
        </Providers>
    );
};
export default App;
