import styled from 'styled-components';

export const PageWrapper = styled.div`
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    max-width: 600px;
    margin: auto;
`;

export const IconWrapper = styled.div`
    background: #eaeaea;
    display: block;
    padding: 2rem;
    border-radius: 1rem;
`;

export const Title = styled.h1`
    font-weight: normal;
    font-size: 2rem;
    margin-top: 2rem;
`;

export const Description = styled.p`
    color: #6b6b6b;
    margin-top: 0;
    margin-bottom: 3rem;
    text-align: center;
    font-size: 1.2rem;
`;

export const Red = styled.em`
    font-weight: bold;
    font-style: normal;
    color: #db3737;
`;

export const Purple = styled.em`
    font-weight: bold;
    font-style: normal;
    color: #3f51b5;
`;
