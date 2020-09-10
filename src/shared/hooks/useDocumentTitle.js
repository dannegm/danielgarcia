import { useRef, useEffect } from 'react';

const useDocumentTitle = (title, retainOnUnmount = false) => {
    const defaultTitle = useRef(document.title);

    useEffect(() => {
        document.title = title;
        return () => {
            if (!retainOnUnmount) {
                document.title = defaultTitle.current;
            }
        };
    }, [title]);
};

export default useDocumentTitle;
