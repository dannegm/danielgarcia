import useRedirect from '@/state/hooks/useRedirect'

const PushLocation = ({ to }) => {
    useRedirect(to)
    return null
}

export default PushLocation