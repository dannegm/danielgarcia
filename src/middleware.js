import { NextResponse } from 'next/server';

export function middleware(request) {
    return NextResponse.redirect(new URL('/maintenance', request.url));
}

export const config = {
    matcher: ['/((?!_next/static|_next/image|favicon.ico|maintenance).*)'],
};
