import { NextResponse } from 'next/server';

const MAINTENANCE_MODE = true;

export function proxy(request) {
    if (!MAINTENANCE_MODE) return NextResponse.next();
    return NextResponse.redirect(new URL('/maintenance', request.url));
}

export const config = {
    matcher: ['/((?!_next/static|_next/image|favicon.ico|maintenance).*)'],
};
