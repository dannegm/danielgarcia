/* eslint-disable camelcase */
import React from 'react';

import avatare_covid19 from '@/assets/images/avatares/avatare-covid19.png';
import avatare_vader from '@/assets/images/avatares/avatare-vader.png';

import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import Galaxy from '@/shared/components/Galaxy';

import {
    // Breakline
    Page,
    Background,
    Overlay,
    Hero,
    AvatarContainer,
    Avatar,
    DescritionContainer,
    Hello,
    Name,
    Title,
    Description,
    Link,
    SocialLinks,
    SocialLink,
} from './Home.styled';

const isBetweenDates = (start, end) => {
    const now = Date.now();
    const startTime = new Date(start).getTime();
    const endTime = new Date(end).getTime();
    return now > startTime && now < endTime;
};

const getAvatar = () => {
    if (isBetweenDates('05/03/2021', '05/09/2021')) {
        return avatare_vader;
    }

    return avatare_covid19;
};

const Home = () => {
    useDocumentTitle('Hello!, I’m Daniel García');

    return (
        <Page>
            <Background>
                <Galaxy />
            </Background>
            <Overlay>
                <Hero>
                    <AvatarContainer>
                        <Avatar
                            src={getAvatar()}
                            alt='Avatar of Daniel García'
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
                            coding something awesone.
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
                                color='#0A66C2'
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

export default Home;
