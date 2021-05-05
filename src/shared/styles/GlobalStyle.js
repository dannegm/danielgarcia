import { createGlobalStyle } from 'styled-components';
import { normalize } from 'styled-normalize';

import '@blueprintjs/core/lib/css/blueprint.css';
// eslint-disable-next-line import/no-extraneous-dependencies
import '@blueprintjs/icons/lib/css/blueprint-icons.css';

const GlobalStyle = createGlobalStyle`
    ${normalize}

    html {
        box-sizing: border-box;
        font-size: 14px;
    }

    *,
    *::before,
    *::after {
        box-sizing: inherit;
    }

    body {
        font-family: 'Raleway', Helvetica, Arial, sans-serif;
        color: #050038;
    }

    a {
        cursor: pointer;
        text-decoration: none;

        &:hover {
            text-decoration: underline;
        }
    }
`;

export default GlobalStyle;
