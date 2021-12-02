import React from 'react';
import Snowfall from 'react-snowfall';

import { Background } from './BgXmas.styled';

const BgXmas = () => {
    const snowFallConfig = {
        color: '#dee4fd',
        snowflakeCount: 120,
        speed: [0.5, 1.5],
        wind: [-0.5, 0.5],
        radius: [0.5, 2.5],
    };

    return (
        <>
            <Snowfall {...snowFallConfig} />
            <Background />
        </>
    );
};

export default BgXmas;
