import Link from 'next/link';
import { Providers } from '@/modules/core/providers/providers';
import { cn } from '@/modules/core/helpers/utils';
import './globals.css';

import { DarkModeToggle } from '@/modules/main/components/dark-mode-toggle';
import { BreakpointIndicator } from '@/modules/core/components/breakpoint-indicator';
import { Section } from '@/modules/main/components/section';

export const metadata = {
    title: "Hello!, I'm Daniel García",
};

const Layout = ({ children }) => {
    return (
        <html lang='en'>
            <body className={cn('antialiased')}>
                <Providers>
                    <BreakpointIndicator />
                    <Section
                        className='min-h-screen'
                        classNames={{ wrapper: 'absolute z-0 top-0 w-full border-b-0' }}
                    />

                    <div className='relative bg-background'>
                        <Section
                            className='flex flex-row items-center justify-between'
                            classNames={{ wrapper: 'sticky top-0 z-1 bg-background' }}
                        >
                            <Link className='flex flex-row items-center gap-2' href='/'>
                                <img
                                    className='size-4 dark:invert'
                                    src='/img/logo/axolote-96x96.png'
                                    alt='Axolote Shape'
                                />
                                <p className='text-sm tracking-tight'>Daniel García</p>
                            </Link>
                            <DarkModeToggle className='-m-2 ml-0' />
                        </Section>
                        {children}
                        <Section className='h-[54px]' />
                    </div>
                </Providers>
            </body>
        </html>
    );
};

export default Layout;
