/* eslint-disable camelcase */
import React from 'react';

import { useParams } from 'react-router-dom';
import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';
import { getAvatarByKey } from '@/shared/services/avatares';

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

const AvatarPage = () => {
    useDocumentTitle('Hello!, I’m Daniel García');

    const { avatarKey } = useParams();

    const $avatar = getAvatarByKey(avatarKey);

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
                        <Name>
                            I’m <b>Daniel García</b>,
                        </Name>
                        <Title>Software Specialist.</Title>
                        <Description>
                            Currently may find me at{' '}
                            <Link href='https://www.wizeline.com/'>
                                Wizeline
                            </Link>{' '}
                            coding something awesome.
                        </Description>
                        <SocialLinks>
                            <SocialLink
                                color='#d1d5da'
                                href='https://github.com/dannegm'
                            >
                                Github
                            </SocialLink>
                            <SocialLink
                                color='#1da1f2'
                                href='https://twitter.com/dannegm'
                            >
                                Twitter
                            </SocialLink>
                            <SocialLink
                                color='#0a66c2'
                                href='https://www.linkedin.com/in/dannegm'
                            >
                                LinkedIn
                            </SocialLink>
                            <SocialLink
                                color='#dd2a7b'
                                href='https://www.instagram.com/dannegm'
                            >
                                Instagram
                            </SocialLink>
                        </SocialLinks>
                    </DescritionContainer>
                </Hero>
            </Overlay>
        </Page>
    );
};

export default AvatarPage;
