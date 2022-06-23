/* eslint-disable camelcase */
import React from 'react';
import moment from 'moment';

import avatare_default from '@assets/images/avatares/avatare.png';
import avatare_noir from '@assets/images/avatares/avatare-noir.png';
import avatare_covid19 from '@assets/images/avatares/avatare-covid19.png';
import avatare_vader from '@assets/images/avatares/avatare-vader.png';
import avatare_interestepan from '@assets/images/avatares/avatare-interestepan.png';
import avatare_mex from '@assets/images/avatares/avatare-mex.png';
import avatare_pumpkin from '@assets/images/avatares/avatare-pumpkin.png';
import avatare_xmas from '@assets/images/avatares/avatare-xmas.png';
// import avatare_newyar2021 from '@assets/images/avatares/avatare-newyear-2021.png';
import avatare_kid from '@assets/images/avatares/avatare-kid.png';
import avatare_daftpunk from '@assets/images/avatares/avatare-daftpunk.png';
import avatare_hackerman from '@assets/images/avatares/avatare-hackerman.png';
import avatare_nft from '@assets/images/avatares/avatare-nft.png';
import avatare_julysix from '@assets/images/avatares/avatare-julysix.png';

import BgCyberpunk from '@components/BgCyberpunk';
import BgXmas from '@components/BgXmas';
import BgJulySix from '@components/BgJulySix';

export const NOIR_SEASON = false;
export const COVID_SEASON = true;

export const specialAvatars = {
    default: {
        key: 'default',
        description: 'No se te olvide salir sin tu cubrebocas',
        url: avatare_default,
        color: undefined,
    },
    noir: {
        key: 'noir',
        description: 'No se te olvide salir sin tu cubrebocas',
        url: avatare_noir,
        color: '#222222',
    },
    covid19: {
        key: 'covid19',
        description: 'No se te olvide salir sin tu cubrebocas',
        url: avatare_covid19,
        color: undefined,
    },
    daftPunk: {
        key: 'daftPunk',
        description: 'No se te olvide salir sin tu cubrebocas',
        url: avatare_daftpunk,
        color: '#4e4d8e',
    },
};

export const seasonAvatar = [
    {
        key: 'hackerman',
        description: 'Happy Hacking :)',
        yearly: true,
        year: null,
        start: '09/10',
        end: '09/15',
        url: avatare_hackerman,
        color: undefined,
        bgComponent: <BgCyberpunk />,
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Hacker-Dan-Happy-Hacking/PqFI1hftu7aAVLQ',
        },
    },
    {
        key: 'mex',
        description: 'Festejando las fechas patrias',
        yearly: true,
        year: null,
        start: '09/15',
        end: '10/01',
        url: avatare_mex,
        color: '#003020',
    },
    {
        key: 'pumpkin',
        description: 'Festejando halloween y día de muertos',
        yearly: true,
        year: null,
        start: '10/20',
        end: '11/05',
        url: avatare_pumpkin,
        color: '#241e28',
    },
    {
        key: 'revo',
        description: 'Festejando la revolución mexicana',
        yearly: true,
        year: null,
        start: '11/20',
        end: '11/21',
        url: avatare_mex,
        color: '#926a44',
    },
    {
        key: 'xmas',
        description: 'Festejando Navidad',
        yearly: true,
        year: null,
        start: '12/1',
        end: '12/30',
        url: avatare_xmas,
        color: '#681b19',
        bgComponent: <BgXmas />,
    },
    {
        key: 'newyear',
        description: 'Festejando Año nuevo',
        yearly: true,
        year: null,
        start: '01/01',
        end: '01/15',
        url: avatare_xmas,
        color: '#3200c4',
        bgComponent: <BgXmas />,
    },
    {
        key: 'wisemen',
        description: 'Representando la llegada de los reyes magos',
        yearly: true,
        year: null,
        start: '01/05',
        end: '01/07',
        url: avatare_default,
        color: undefined,
    },
    {
        key: 'valentin',
        description: 'Festejando San Valentón',
        yearly: true,
        year: null,
        start: '02/01',
        end: '03/01',
        url: avatare_daftpunk,
        color: '#71095b',
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Naft-Nunk-Good-bye-dear-Daft-Punk/zHSwiHz_QexA1eE',
        },
    },
    {
        key: 'spring',
        description: 'Mood primaveral',
        yearly: true,
        year: null,
        start: '03/21',
        end: '03/31',
        url: avatare_daftpunk,
        color: '#66627d',
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Hacker-Dan-Happy-Hacking/PqFI1hftu7aAVLQ',
        },
    },
    {
        key: 'fools',
        description: 'Festejando mi cumpleaños',
        yearly: true,
        year: null,
        start: '04/01',
        end: '04/29',
        url: avatare_nft,
        color: undefined,
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Nored-Nape-Bored-Ape-into-my-version-/Ykd2ftDawozEtoN',
        },
    },
    {
        key: 'kid',
        description: 'Festejando el día del niño',
        yearly: true,
        year: null,
        start: '04/30',
        end: '05/01',
        url: avatare_kid,
        color: '#1c5377',
    },
    {
        key: 'vader',
        description: 'May the force be with you',
        yearly: true,
        year: null,
        start: '05/04',
        end: '05/14',
        url: avatare_vader,
        color: '#1f2029',
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Dan-Vader-May-the-force-be-with-you/N5ZT3AatHGeh7rS',
        },
    },
    {
        key: 'interestepan',
        description: 'Feliz cumple Pan :3',
        yearly: true,
        year: null,
        start: '05/15',
        end: '05/16',
        url: avatare_interestepan,
        color: '#3b131f',
        nft: {
            link: 'https://mintable.app/COLLECTIBLES/item/Interesterpan-Cat-along-the-space/VgfZwdDJKAnLLoS',
        },
    },
    {
        key: 'julysix',
        description: 'July Six Park',
        yearly: true,
        year: null,
        start: '07/06',
        end: '07/07',
        url: avatare_julysix,
        color: undefined,
        bgComponent: <BgJulySix />,
        isSquare: true,
        nft: {
            link: 'https://mintable.app/collectibles/item/July-Six-Park-Rwarr/FyMpNCbYyALAkMu',
        },
    },
];

export const getDefaultAvatar = () => {
    if (NOIR_SEASON) {
        return specialAvatars.noir;
    }
    if (COVID_SEASON) {
        return specialAvatars.covid19;
    }

    return specialAvatars.default;
};

export const getAvatarByKey = (key = 'default') => {
    if (specialAvatars[key] !== undefined) {
        return specialAvatars[key];
    }

    const avatarCollections = [
        // breakline
        ...seasonAvatar,
    ];

    const $avatar = avatarCollections.find((avatar) => avatar.key === key);

    return $avatar || getDefaultAvatar();
};

export const getTodayAvatar = () => {
    const $today = moment();
    const avatarCollections = [
        // breakline
        ...seasonAvatar,
    ];

    const foundAvatar = avatarCollections.find((avatar) => {
        const year = avatar.yearly ? $today.year() : avatar.year;
        const $start = moment(new Date(`${year}/${avatar.start}`));
        const $end = moment(new Date(`${year}/${avatar.end}`));

        return $today.isBetween($start, $end);
    });

    return foundAvatar || getDefaultAvatar();
};
