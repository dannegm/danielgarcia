import styled from 'styled-components';

import cyberpunk from '@/assets/images/backgrounds/cyberpunk.gif';

export const Background = styled.div`
    width: 100%;
    height: 100%;
    background-color: #5586c9;
    background-image: url(${cyberpunk});
    background-position: center;
    background-size: cover;
    overflow: hidden;
`;
