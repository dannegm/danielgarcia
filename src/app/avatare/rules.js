import {
    isWithinInterval,
    setHours,
    setMinutes,
    setSeconds,
    addDays,
    isSameDay,
    getDayOfYear,
} from 'date-fns';

export const isNight = (now = new Date()) => {
    const startTime = setSeconds(setMinutes(setHours(new Date(), 20), 0), 0); // 8:00 PM
    const endTime = setSeconds(setMinutes(setHours(new Date(), 6), 0), 0); // 6:00 AM (del día siguiente)

    const adjustedEndTime = endTime < startTime ? addDays(endTime, 1) : endTime; // Ajusta si cruza la medianoche

    return isWithinInterval(now, { start: startTime, end: adjustedEndTime });
};

export const isValentinDay = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 1, 14);
    return isSameDay(today, date);
};

export const isBdaySeason = (today = new Date()) => {
    const currentMonth = today.getMonth();
    const currentDay = today.getDate();

    if (currentMonth === 3 && currentDay > 25) return true;
    if (currentMonth === 3 && currentDay < 20) return true;

    return false;
};

export const isKidsDay = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 3, 30);
    return isSameDay(today, date);
};

export const isMay4th = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 4, 4);
    return isSameDay(today, date);
};

export const isPanBday = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 4, 17);
    return isSameDay(today, date);
};

export const isJulySix = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 6, 6);
    return isSameDay(today, date);
};

export const isHackersDay = (today = new Date()) => {
    return getDayOfYear(today) === 256;
};

export const isIndependenceDay = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 8, 16);
    return isSameDay(today, date);
};

export const isSpookySeason = (today = new Date()) => {
    const currentMonth = today.getMonth();
    const currentDay = today.getDate();

    if (currentMonth === 9) return true;
    if (currentMonth === 10 && currentDay < 3) return true;

    return false;
};

export const isNov5th = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 10, 5);
    return isSameDay(today, date);
};

export const isRevolutionDay = (today = new Date()) => {
    const date = new Date(today.getFullYear(), 10, 20);
    return isSameDay(today, date);
};

export const isXmasSeason = (today = new Date()) => {
    const currentMonth = today.getMonth();
    const currentDay = today.getDate();

    if (currentMonth === 11) return true;
    if (currentMonth === 0 && currentDay < 10) return true;

    return false;
};
