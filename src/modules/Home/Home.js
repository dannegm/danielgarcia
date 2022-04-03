/* eslint-disable camelcase */
import React from 'react';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';
import { getTodayAvatar } from '@/shared/services/avatares';

import {
    // Breakline
    Page,
    Background,
    Overlay,
    Hero,
    AvatarContainer,
    Avatar,
    NftBadge,
    DescritionContainer,
    Hello,
} from './Home.styled';

const $avatar = getTodayAvatar();

const Home = () => {
    useDocumentTitle('Hello!');

    const todayBackground = $avatar?.bgComponent;

    return (
        <Page>
            <Background>
                {todayBackground || <Galaxy backgroundColor={$avatar.color} />}
            </Background>
            <Overlay backgroundColor={$avatar.color}>
                <Hero>
                    <AvatarContainer>
                        {$avatar.nft?.link && (
                            <NftBadge href={$avatar.nft?.link} target='_blank'>
                                NFT
                            </NftBadge>
                        )}

                        <Avatar
                            square={$avatar.isSquare}
                            src={$avatar.url}
                            alt={$avatar.description}
                        />
                    </AvatarContainer>
                    <DescritionContainer>
                        <Hello>Hello!</Hello>
                    </DescritionContainer>
                </Hero>
            </Overlay>
        </Page>
    );
};

export default Home;
