import styled from 'styled-components';
import { rgba } from 'polished';

import { Menu } from 'semantic-ui-react';

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
        }
    }
`;

export const Hero = styled.div`
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #fff;
    min-height: 90vh;

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
