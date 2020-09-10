import { useEffect, useState } from 'react';

const useWindowSize = (callback) => {
    const [windowSize, setWindowSize] = useState([
        window.innerWidth,
        window.innerHeight,
    ]);

    const onResize = () => {
        setWindowSize([window.innerWidth, window.innerHeight]);
        callback && callback([window.innerWidth, window.innerHeight]);
    };

    useEffect(() => {
        onResize();
        window.addEventListener('resize', onResize);
        return () => {
            window.removeEventListener('resize', onResize);
        };
    }, []);

    return windowSize;
};

export default useWindowSize;
