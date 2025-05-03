// app/api/time/route.js
export async function GET(request) {
    const server = new Date().toLocaleString();

    const ip = request.headers.get('x-forwarded-for') || '8.8.8.8';
    let client = 'unknown';
    let timeZone = 'unknown';
    let limited = false;

    try {
        const geoRes = await fetch(`https://ipapi.co/${ip}/timezone`);
        timeZone = await geoRes.text();
    } catch (e) {
    } finally {
        if (timeZone.includes('/') && !timeZone.includes('error')) {
            limited = false;
        } else {
            timeZone = 'America/Mexico_City';
            limited = true;
        }
    }

    client = new Date().toLocaleString('en-US', { timeZone });

    return Response.json({ server, client, timeZone, limited });
}
