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

export const AvatarWrapper = styled.figure`
    background: #eaeaea;
    display: block;
    border-radius: 1rem;
    overflow: hidden;
    width: 100px;
    height: 100px;
`;

export const Avatar = styled.img`
    width: 100%;
    height: 100%;
    object-fit: cover;
`;

export const Title = styled.h1`
    font-weight: normal;
    font-size: 2rem;
    margin-top: 2rem;
`;

export const Description = styled.p`
    color: #6b6b6b;
    margin-top: 0;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 1.2rem;
`;

export const Code = styled.code`
    display: block;
    color: white;
    background-color: #1e2c31;
    font-family: monospace;
    padding: 1rem;
    font-size: 1rem;
    margin-top: 1rem;
    margin-bottom: 3rem;
    border-radius: 0.25rem;
`;

export const Purple = styled.em`
    font-weight: bold;
    font-style: normal;
    color: #3f51b5;
`;
