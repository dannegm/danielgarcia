import { Oswald } from 'next/font/google';
import { cn } from '@/modules/core/helpers/utils';

const oswald = Oswald({ subsets: ['latin'], weight: '600' });

export default function Logo({ className, children }) {
    return (
        <h1
            className={cn(
                oswald.className,
                'text-5xl sm:text-6xl tracking-tight text-transparent',
                'bg-[#303050] bg-size-[400px] bg-position-[-60%_80%] sm:bg-position-[-15%_80%] bg-blend-overlay bg-clip-text',
                'dark:bg-[#ebebfa26]',
                className,
            )}
            style={{ backgroundImage: 'url(https://assets.codepen.io/165585/circle-bg_1.svg)' }}
        >
            {children}
        </h1>
    );
}
