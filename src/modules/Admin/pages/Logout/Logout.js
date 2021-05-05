import React, { useEffect } from 'react';
import { Redirect } from 'react-router-dom';

import useAuth from '@/shared/hooks/useAuth';

const Logout = () => {
    const { hasSession, requestLogout } = useAuth();

    useEffect(() => {
        requestLogout();
    }, []);

    if (hasSession) {
        return <></>;
    }

    return !hasSession && <Redirect to='/secret' />;
};

export default Logout;
