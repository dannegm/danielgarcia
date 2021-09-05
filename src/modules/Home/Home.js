/* eslint-disable camelcase */
import React from 'react';

import avatare_covid19 from '@/assets/images/avatares/avatare-covid19.png';
import avatare_vader from '@/assets/images/avatares/avatare-vader.png';
import avatare_interestepan from '@/assets/images/avatares/avatare-interestepan.png';
import avatare_mex from '@/assets/images/avatares/avatare-mex.png';
import avatare_pumpkin from '@/assets/images/avatares/avatare-pumpkin.png';
import avatare_xmas from '@/assets/images/avatares/avatare-xmas.png';
import avatare_newyar2021 from '@/assets/images/avatares/avatare-newyear-2021.png';
import avatare_kid from '@/assets/images/avatares/avatare-kid.png';
import avatare_daftpunk from '@/assets/images/avatares/avatare-daftpunk.png';

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
    if (isBetweenDates('2021/09/01', '2021/10/01')) {
        return avatare_mex;
    }

    if (isBetweenDates('2021/10/20', '2021/11/05')) {
        return avatare_pumpkin;
    }

    if (isBetweenDates('2021/11/20', '2021/11/21')) {
        return avatare_mex;
    }

    // TODO: Crear avatar navideño 2021
    if (isBetweenDates('2021/12/16', '2021/12/30')) {
        return avatare_xmas;
    }

    // TODO: Crear avatar año nuevo 2022
    if (isBetweenDates('2021/12/31', '2021/12/03')) {
        return avatare_newyar2021;
    }

    // TODO: Crear avatar reyes magos
    if (isBetweenDates('2022/01/05', '2022/01/07')) {
        return avatare_covid19;
    }

    // TODO: Crear avatar san valentín
    if (isBetweenDates('2022/02/01', '2022/03/01')) {
        return avatare_covid19;
    }

    // TODO: Crear avatar primaveral (con flores en la cabeza)
    if (isBetweenDates('2022/03/21', '2022/03/31')) {
        return avatare_covid19;
    }

    // TODO: Crear avatar cumpleañero / april fools
    if (isBetweenDates('2022/04/01', '2022/04/29')) {
        return avatare_daftpunk;
    }

    if (isBetweenDates('2022/04/30', '2022/05/01')) {
        return avatare_kid;
    }

    if (isBetweenDates('2022/05/04', '2022/05/14')) {
        return avatare_vader;
    }

    if (isBetweenDates('2022/05/15', '2022/05/16')) {
        return avatare_interestepan;
    }

    // TODO: Crear avatar de Jurasic Park
    if (isBetweenDates('2022/07/06', '2022/07/07')) {
        return avatare_covid19;
    }

    if (isBetweenDates('2022/09/01', '2022/10/01')) {
        return avatare_mex;
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

export default Home;
