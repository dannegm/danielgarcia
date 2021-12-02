import styled from 'styled-components';

import nightcity from '@/assets/images/backgrounds/nightcity.jpg';

export const Background = styled.div`
    width: 100%;
    height: 100%;
    background-color: #681b19;
    background-image: url(${nightcity});
    background-position: center;
    background-size: cover;
    overflow: hidden;
`;
