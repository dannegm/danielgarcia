import { useEffect } from 'react'

const useRedirect = to => {
    useEffect(() => {
        window.location.href = to
    }, [])
}

export default useRedirect