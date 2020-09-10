import { useEffect, useRef } from 'react';

const useAnimationFrame = (callback) => {
    const frame = useRef();
    const tick = () => {
        callback();
        frame.current = requestAnimationFrame(tick);
    };

    useEffect(() => {
        tick();
        return () => {
            cancelAnimationFrame(frame.current);
        };
    }, []);
};

export default useAnimationFrame;
