import Providers from '@/modules/core/providers/providers';

export default function RootLayout({ children }) {
    return <Providers>{children}</Providers>;
}
