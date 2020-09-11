import styled from 'styled-components';
import { Button } from 'semantic-ui-react';

export const LoginWrapper = styled.div`
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
`;

export const LoginAvatarIcon = styled.div`
    display: flex;
    width: 6rem;
    height: 6rem;
    justify-content: center;
    align-items: center;
    background-color: #edf0f3;
    border-radius: 0.5rem;
`;
export const LoginAvatarImg = styled.div`
    display: block;
    width: 6rem;
    height: 6rem;
    overflow: hidden;
    background-color: #edf0f3;
    border-radius: 0.5rem;
    & > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
`;

export const LoginTitle = styled.h1`
    font-weight: normal;
    margin-top: 4rem;
`;

export const LoginDescription = styled.p`
    color: #6b6b6b;
    margin-top: 0;
    margin-bottom: 1rem;
    text-align: center;
`;

export const LoginToken = styled.code`
    display: block;
    color: white;
    background-color: #1e2c31;
    font-family: monospace;
    padding: 1rem 2rem;
    font-size: 1rem;
    margin-top: 1rem;
    margin-bottom: 1rem;
    border-radius: 0.25rem;
`;

export const BlueText = styled.span`
    font-weight: bold;
    color: #3f51b5;
`;

export const PurpleText = styled.span`
    font-weight: bold;
    color: #e040fb;
`;

export const LoginButtonAction = styled(Button)`
    &.button {
        margin: 1rem;
    }
`;

export const LoginButtonLink = styled(Button)`
    &.button.basic {
        border: 0;
        box-shadow: none;
    }
`;
