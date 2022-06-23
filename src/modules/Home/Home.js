/* eslint-disable camelcase */
import React from 'react';

import useDocumentTitle from '@hooks/useDocumentTitle';
import Galaxy from '@components/Galaxy';
import { getTodayAvatar } from '@services/avatares';

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
    Name,
    Title,
    Description,
    Link,
    SocialLinks,
    SocialLink,
} from './Home.styled';

const $avatar = getTodayAvatar();

const Home = () => {
    useDocumentTitle('Hello!, I’m Daniel García');

    const todayBackground = $avatar?.bgComponent;

    return (
        <Page>
            <Background>{todayBackground || <Galaxy backgroundColor={$avatar.color} />}</Background>
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
                        <Name>
                            I’m <b>Daniel García</b>,
                        </Name>
                        <Title>Software Specialist.</Title>
                        <Description>
                            Currently may find me at{' '}
                            <Link href='https://www.encora.com/'>Encora</Link> coding something
                            awesome.
                        </Description>
                        <SocialLinks>
                            <SocialLink color='#d1d5da' href='https://github.com/dannegm'>
                                Github
                            </SocialLink>
                            <SocialLink color='#1da1f2' href='https://twitter.com/dannegm'>
                                Twitter
                            </SocialLink>
                            <SocialLink color='#0a66c2' href='https://www.linkedin.com/in/dannegm'>
                                LinkedIn
                            </SocialLink>
                            <SocialLink color='#dd2a7b' href='https://www.instagram.com/dannegm'>
                                Instagram
                            </SocialLink>
                        </SocialLinks>
                    </DescritionContainer>
                </Hero>
            </Overlay>
        </Page>
    );
};

export default Home;
