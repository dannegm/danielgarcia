import styled, { css } from 'styled-components';
import { rgba } from 'polished';

import { breakpoints } from '@styles/mediaQueries';
import { isDark, hexToArray } from '@helpers/colors';

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
    /* stylelint-disable-next-line declaration-colon-newline-after */
    background-color: ${({ backgroundColor = '#022D4B' }) => rgba(backgroundColor, 0.5)};
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
    position: relative;
    margin: 0;
    padding: 0;
    flex: none;
    width: 320px;
    padding-right: 2rem;
    margin-right: 2rem;

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
    margin-left: -1rem;
    padding: 0;
    width: 100%;
    border-radius: 1rem;
    border: 0;

    ${breakpoints.mobile(css`
        margin-left: 0;
    `)}
`;

export const NftBadge = styled.a`
    position: absolute;
    bottom: 2rem;
    right: 2rem;
    display: block;
    padding: 0.3rem 0.5rem;
    color: #fff;
    background: #7e42ff;
    border-radius: 3px;
    font-family: 'Archivo Black', sans-serif;
    font-size: 1.5rem;
    text-decoration: none;
    transition: all 0.2s;

    &:hover,
    &:active,
    &:visited {
        color: #fff;
        text-decoration: none;
    }

    &:hover {
        transform: scale(1.1);
    }

    ${breakpoints.desktop(css`
        bottom: 1.5rem;
        right: 1.5rem;
        font-size: 1rem;
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
    font-size: 0.8em;
    font-weight: 500;
    position: relative;
    text-decoration: none !important;
    background-color: ${({ color }) => color || '#f0575d'};
    color: ${({ color = '#f0575d' }) => (color && isDark(hexToArray(color)) ? '#fff' : '#222')};
    padding: 0.25rem 0.5rem;
    padding-bottom: 0.35rem;
    margin: 0.15rem inherit;
    border-radius: 4px;
    max-height: 2rem;

    &:hover,
    &:visited {
        color: ${({ color = '#f0575d' }) => (color && isDark(hexToArray(color)) ? '#fff' : '#222')};
    }
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
`;
