import styled from 'styled-components';
import { rgba } from 'polished';

export const Page = styled.div`
    display: block;
    position: relative;
    overflow: hidden;
`;

export const Background = styled.div`
    width: 100%;
    height: 100vh;
    overflow: hidden;
`;

export const Overlay = styled.div`
    position: absolute;
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    z-index: 10;
    justify-content: center;
    align-items: center;
    color: #fff;

    h1 {
        font-size: 2rem;
        margin: 0;
    }
    img {
        width: 12rem;
        margin: 3rem;
        border-radius: 50%;
        border: 3px solid ${rgba('#fff', 0.1)};
    }
`;
