import React, { useCallback, useContext, useState } from 'react';
import { nanoid } from 'nanoid';
import styled from 'styled-components';

const NotificationsContext = React.createContext(null);

const useNotifications = () => {
    const context = useContext(NotificationsContext);
    if (!context) {
        throw new Error(
            `Can't use "useNotifications" without an NotificationsProvider!`,
        );
    }
    return context;
};

// ============

const Host = styled.div`
    display: flex;
    width: 300px;
    flex-direction: column;
    position: fixed;
    left: 1rem;
    bottom: 1rem;
    gap: 1rem;
    z-index: 9999;
`;

const ToastContainer = styled.div`
    border-radius: 3px;
    background: #fff;
    padding: 0.5rem;
    font-size: 0.875rem;
    color: #222;
    display: flex;
    flex: 1;
    justify-content: flex-start;
    align-items: center;
    gap: 0.5rem;
`;

const NotificationsHost = ({ stack }) => {
    return (
        <Host>
            {stack.map((item) => {
                const [key] = useState(nanoid);
                return (
                    <ToastContainer key={key}>{item.content}</ToastContainer>
                );
            })}
        </Host>
    );
};

// ============

const NotificationsProvider = ({ children }) => {
    const [stack, setStack] = useState([]);

    const push = useCallback((payload) => {
        const currentStack = [payload, ...stack];
        setStack(currentStack);
    }, []);

    return (
        <NotificationsContext.Provider value={{ push }}>
            <NotificationsHost stack={stack} />
            {children}
        </NotificationsContext.Provider>
    );
};

export { useNotifications };
export default NotificationsProvider;
