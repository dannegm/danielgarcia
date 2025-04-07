'use client';

import { JetBrains_Mono } from 'next/font/google';

import { cn } from '@/modules/core/helpers/utils';
import { useDocumentClassNames } from '@/modules/core/hooks/use-document-class-names';

const jetbrains = JetBrains_Mono({ subsets: ['latin'] });

export const FontsProvider = ({ children }) => {
    useDocumentClassNames({
        body: cn(jetbrains.className),
    });

    return <>{children}</>;
};
