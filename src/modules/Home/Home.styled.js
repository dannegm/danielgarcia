import styled, { css } from 'styled-components';
import { rgba } from 'polished';
import { breakpoints } from '@/shared/styles/mediaQueries';
import { isDark, hexToArray } from '@/shared/helpers/colors';

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
    z-index: 10;
    top: 0;
    width: 100%;
    min-height: 100vh;
    backdrop-filter: blur(2px);
    background-color: ${rgba('#022D4B', 0.5)};
`;

export const Hero = styled.div`
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    min-height: 100vh;

    ${breakpoints.mobile(css`
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-end;
        padding: 4rem 2rem;
    `)}
`;

export const AvatarContainer = styled.div`
    margin: 0;
    padding: 0;
    flex: none;
    width: 320px;
    padding-right: 2rem;
    margin-right: 2rem;
    border-right: 4px solid #fff;

    ${breakpoints.desktop(css`
        width: 200px;
    `)}

    ${breakpoints.mobile(css`
        padding-right: 0;
        margin-right: 0;
        border-right: 0;
        margin-bottom: 2rem;
        width: 60%;
    `)}
`;

export const Avatar = styled.img`
    margin: 0;
    padding: 0;
    width: 100%;
    border-radius: 50%;
    border: 4px solid #fff;

    ${breakpoints.mobile(css`
        border-radius: 1rem;
        border: 0;
    `)}
`;

export const DescritionContainer = styled.div`
    flex: none;
`;

export const Hello = styled.div`
    color: #fff;
    font-size: 3rem;
    font-weight: 300;

    ${breakpoints.desktop(css`
        font-size: 1.5rem;
    `)}
`;

export const Name = styled.div`
    color: #fff;
    font-size: 5rem;
    font-weight: 300;
    & > b {
        font-weight: 500;
    }

    ${breakpoints.desktop(css`
        font-size: 3rem;
    `)}

    ${breakpoints.mobile(css`
        font-size: 2rem;
    `)}
`;

export const Title = styled.div`
    color: #fff;
    font-size: 2rem;
    font-weight: 300;

    ${breakpoints.desktop(css`
        font-size: 1.25rem;
    `)}
`;

export const Description = styled.div`
    color: #fff;
    font-size: 1.5rem;
    margin-top: 2rem;
    font-weight: 300;

    ${breakpoints.desktop(css`
        font-size: 1rem;
        margin-top: 1.5rem;
    `)}
`;

export const Link = styled.a.attrs({ target: '_blank' })`
    display: inline-block;
    color: ${({ color }) => color || '#f0575d'};
    font-weight: 500;
    position: relative;
    text-decoration: none !important;

    &::after {
        content: ' ';
        display: block;
        width: 0%;
        border-bottom: 2px solid ${({ color }) => color || '#f0575d'};
        position: absolute;
        margin-top: -2px;
        transition: all 0.2s;
    }

    &:hover {
        &::after {
            width: 100%;
        }
    }

    ${breakpoints.mobile(css`
        background-color: ${({ color }) => color || '#f0575d'};
        color: ${({ color = '#f0575d' }) =>
            color && isDark(hexToArray(color)) ? '#fff' : '#222'};
        padding: 0.25rem 0.5rem;
        margin: 0.15rem inherit;
        border-radius: 4px;
        max-height: 2rem;
    `)}
`;

export const SocialLinks = styled.div`
    color: #fff;
    font-size: 1.5rem;
    margin-top: 1rem;
    display: flex;
    flex-direction: row;

    ${breakpoints.desktop(css`
        font-size: 1rem;
        margin-top: 0.5rem;
    `)}

    ${breakpoints.mobile(css`
        margin-top: 2rem;
    `)}
`;

export const SocialLink = styled(Link)`
    margin-right: 1rem;

    &::before {
        content: '/';
        margin-right: 2px;
        display: inline-block;
    }

    ${breakpoints.mobile(css`
        margin-right: 0.5rem;

        &::before {
            content: '';
            display: none;
        }
    `)}
`;
