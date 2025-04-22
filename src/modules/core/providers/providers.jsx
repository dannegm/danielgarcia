'use client';

import { Suspense } from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import { NuqsAdapter } from 'nuqs/adapters/next';

import { DarkModeProvider } from '@/modules/core/providers/dark-mode-provider';
import { FontsProvider } from '@/modules/core/providers/fonts-provider';
import { TrackersProvider } from './trackers-provider';

const queryClient = new QueryClient();

export const Providers = ({ children }) => {
    return (
        <NuqsAdapter>
            <TrackersProvider>
                <QueryClientProvider client={queryClient}>
                    <DarkModeProvider>
                        <FontsProvider>
                            <Suspense>{children}</Suspense>
                        </FontsProvider>
                    </DarkModeProvider>
                </QueryClientProvider>
            </TrackersProvider>
        </NuqsAdapter>
    );
};
