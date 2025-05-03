// app/api/time/route.js
export async function GET(request) {
    const server = new Date().toLocaleString();

    const ip = request.headers.get('x-forwarded-for') || '8.8.8.8';
    let client = 'unknown';

    try {
        const geoRes = await fetch(`https://ipapi.co/${ip}/timezone`);
        const timezone = await geoRes.text();
        if (timezone.includes('/')) {
            client = new Date().toLocaleString({ timeZone: 'America/Mexico_City' });
        }
    } catch {}

    return Response.json({ server, client });
}
