import styled from 'styled-components';

export const Wrapper = styled.div`
    display: flex;
    width: 100%;
    height: 100%;
    background-color: ${({ backgroundColor }) => backgroundColor};
    overflow: hidden;
`;

export const Canvas = styled.div`
    display: block;
    width: 100%;
    height: 100%;
    overflow: hidden;
    flex: 1;
`;
