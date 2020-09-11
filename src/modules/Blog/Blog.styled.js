import styled from 'styled-components';

import { Container, Menu } from 'semantic-ui-react';

export const Page = styled.div`
    display: block;
    position: relative;
    overflow: hidden;
`;

export const Background = styled.div`
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 7.5rem;
    overflow: hidden;
`;

export const Overlay = styled.div`
    top: 0;
    width: 100%;
    min-height: 100vh;
`;

export const Content = styled(Container)`
    margin-top: 6rem;
    margin-bottom: 6rem;
`;

export const Footer = styled.div`
    width: 100%;
    height: 12rem;
`;

export const Avatar = styled.img`
    border-radius: 0.5rem;
    width: 3.5rem;
    position: absolute;
    margin-left: -2.5rem;
    cursor: pointer;
`;

export const MenuWrapper = styled.div`
    margin: 2rem;
`;

export const TransparentMenu = styled(Menu)`
    &.menu {
        background: rgba(255 255 255 / 2%);
        .item.link {
            color: rgba(255 255 255 / 60%);
            &:hover {
                background: rgba(255 255 255 / 2%);
                color: rgba(255 255 255 / 90%);
            }

            &.active {
                background: rgba(255 255 255 / 5%);
                color: rgba(255 255 255 / 90%);
            }
        }
    }
`;
