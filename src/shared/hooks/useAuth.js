import { useState } from 'react';
import { nanoid } from 'nanoid';
import { firebase, auth, db } from '@/shared/services/firebase';

const GoogleAuthProvider = new firebase.auth.GoogleAuthProvider();

const INITIAL_USER = {
    uid: nanoid(),
    email: 'none@mail.com',
    displayName: 'UNKNOWN',
    photoURL: '#',
};

const useAuth = () => {
    const [user, setUser] = useState(INITIAL_USER);
    const [isAuthorized, setAuthorized] = useState(false);
    const [hasSession, setSession] = useState(false);
    const [isLoading, setLoading] = useState(true);

    auth.onAuthStateChanged(async (authUser) => {
        if (authUser) {
            setUser(authUser);
            const usersSnapshot = await db
                .collection('users')
                .doc(authUser.uid)
                .get();
            setSession(true);
            setAuthorized(usersSnapshot.exists);
            setLoading(false);
        } else {
            setUser(INITIAL_USER);
            setSession(false);
            setAuthorized(false);
            setLoading(false);
        }
    });

    const requestLogin = async () => {
        await auth.signInWithPopup(GoogleAuthProvider);
    };

    const requestLogout = async () => {
        setLoading(true);
        await auth.signOut();
        setUser(INITIAL_USER);
        setSession(false);
        setAuthorized(false);
        setLoading(false);
    };

    return {
        isLoading,
        isAuthorized,
        hasSession,
        user,
        requestLogin,
        requestLogout,
    };
};

export default useAuth;
