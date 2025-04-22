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

const commonAvatar = '/img/avatares/avatare.png';

const getConditionalAvatar = (defaultAvatar, maps) => {
    const reverseMaps = [...maps]; //.reverse();
    return reverseMaps.reduce((q, { condition, mapper }) => {
        if (!condition) return q;
        return mapper?.(q);
    }, defaultAvatar);
};

const conditionalAvatar = getConditionalAvatar(commonAvatar, [
    {
        condition: isNight(),
        mapper: () => '/img/avatares/avatare-noir.png',
    },
    {
        condition: isValentinDay(),
        mapper: () => '/img/avatares/avatare-valentin.png',
    },
    {
        condition: isBdaySeason(),
        mapper: () => '/img/avatares/avatare-daftpunk.png',
    },
    {
        condition: isKidsDay(),
        mapper: () => '/img/avatares/avatare-kid.png',
    },
    {
        condition: isMay4th(),
        mapper: () => '/img/avatares/avatare-vader.png',
    },
    {
        condition: isPanBday(),
        mapper: () => '/img/avatares/avatare-interestepan.png',
    },
    {
        condition: isJulySix(),
        mapper: () => '/img/avatares/avatare-julysix.png',
    },
    {
        condition: isHackersDay(),
        mapper: () => '/img/avatares/avatare-hackerman.png',
    },
    {
        condition: isIndependenceDay(),
        mapper: () => '/img/avatares/avatare-mex.png',
    },
    {
        condition: isSpookySeason(),
        mapper: () => '/img/avatares/avatare-pumpkin.png',
    },
    {
        condition: isNov5th(),
        mapper: () => '/img/avatares/avatare-guy-fawkes.png',
    },
    {
        condition: isRevolutionDay(),
        mapper: () => '/img/avatares/avatare-mex.png',
    },
    {
        condition: isXmasSeason(),
        mapper: () => '/img/avatares/avatare-xmas.png',
    },
]);

export const GET = async () => {
    const filePath = join(process.cwd(), 'public', conditionalAvatar);
    const imageBuffer = await readFile(filePath);

    return new Response(imageBuffer, {
        headers: {
            'Content-Type': 'image/png',
            'Content-Disposition': 'inline',
        },
    });
};
