import React from 'react'
import './styles.scss'

import useDocumentTitle from '@/state/hooks/useDocumentTitle'

const Home = () => {
    useDocumentTitle('Home')

    return (
        <div className={'home'}>
            <h1>Hello!</h1>
            <h2>I'm Daniel García</h2>
        </div>
    )
}

export default Home