'use client';

import { Suspense } from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import { NuqsAdapter } from 'nuqs/adapters/next';

import { DarkModeProvider } from '@/modules/core/providers/dark-mode-provider';
import { FontsProvider } from '@/modules/core/providers/fonts-provider';

const queryClient = new QueryClient();

export const Providers = ({ children }) => {
    return (
        <NuqsAdapter>
            <QueryClientProvider client={queryClient}>
                <DarkModeProvider>
                    <FontsProvider>
                        <Suspense>{children}</Suspense>
                    </FontsProvider>
                </DarkModeProvider>
            </QueryClientProvider>
        </NuqsAdapter>
    );
};
