import useRedirect from '@/state/hooks/useRedirect'

const External = ({ url }) => {
    useRedirect(url)
    return null
}

export default External