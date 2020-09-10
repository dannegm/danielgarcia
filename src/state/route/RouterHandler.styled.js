import styled from 'styled-components';
import { rgba } from 'polished';

export const Loading = styled.div`
    position: fixed;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    background-color: ${rgba('#151F23', 0.5)};
    backdrop-filter: blur(1rem);
    z-index: 9999;
`;
