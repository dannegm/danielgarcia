import { join } from 'path';
import { readFile } from 'fs/promises';
import {
    isBdaySeason,
    isHackersDay,
    isIndependenceDay,
    isJulySix,
    isKidsDay,
    isMay4th,
    isNight,
    isNov5th,
    isPanBday,
    isRevolutionDay,
    isSpookySeason,
    isValentinDay,
    isXmasSeason,
} from './rules';
import { getGeolocatedDate } from '@/modules/core/services/time';

const commonAvatar = '/img/avatares/avatare.png';

const getConditionalAvatar = (defaultAvatar, maps) => {
    const reverseMaps = [...maps]; //.reverse();
    return reverseMaps.reduce((q, { condition, mapper }) => {
        if (!condition) return q;
        return mapper?.(q);
    }, defaultAvatar);
};

const buildConditionalAvatar = (now = new Date()) =>
    getConditionalAvatar(commonAvatar, [
        {
            condition: isNight(now),
            mapper: () => '/img/avatares/avatare-noir.png',
        },
        {
            condition: isValentinDay(now),
            mapper: () => '/img/avatares/avatare-valentin.png',
        },
        {
            condition: isBdaySeason(now),
            mapper: () => '/img/avatares/avatare-daftpunk.png',
        },
        {
            condition: isKidsDay(now),
            mapper: () => '/img/avatares/avatare-kid.png',
        },
        {
            condition: isMay4th(now),
            mapper: () => '/img/avatares/avatare-vader.png',
        },
        {
            condition: isPanBday(now),
            mapper: () => '/img/avatares/avatare-interestepan.png',
        },
        {
            condition: isJulySix(now),
            mapper: () => '/img/avatares/avatare-julysix.png',
        },
        {
            condition: isHackersDay(now),
            mapper: () => '/img/avatares/avatare-hackerman.png',
        },
        {
            condition: isIndependenceDay(now),
            mapper: () => '/img/avatares/avatare-mex.png',
        },
        {
            condition: isSpookySeason(now),
            mapper: () => '/img/avatares/avatare-pumpkin.png',
        },
        {
            condition: isNov5th(now),
            mapper: () => '/img/avatares/avatare-guy-fawkes.png',
        },
        {
            condition: isRevolutionDay(now),
            mapper: () => '/img/avatares/avatare-mex.png',
        },
        {
            condition: isXmasSeason(now),
            mapper: () => '/img/avatares/avatare-xmas.png',
        },
    ]);

export const GET = async request => {
    const ip = request.headers.get('x-forwarded-for');
    const geolocatedDate = await getGeolocatedDate({ ip });
    const conditionalAvatar = buildConditionalAvatar(geolocatedDate);

    const filePath = join(process.cwd(), 'public', conditionalAvatar);
    const imageBuffer = await readFile(filePath);

    return new Response(imageBuffer, {
        headers: {
            'Content-Type': 'image/png',
            'Content-Disposition': 'inline',
        },
    });
};
