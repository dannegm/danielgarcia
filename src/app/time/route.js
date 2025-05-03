// app/api/time/route.js
export async function GET(request) {
    const server = new Date().toLocaleString();

    const ip = request.headers.get('x-forwarded-for') || '8.8.8.8';
    let client = 'unknown';
    let timeZone = 'America/Mexico_City';
    let limited = true;

    try {
        const geoRes = await fetch(`https://ipapi.co/${ip}/timezone`);
        timeZone = await geoRes.text();
        limited = false;
    } catch (e) {
    } finally {
        if (timeZone.includes('/')) {
            client = new Date().toLocaleString('en-US', { timeZone });
        }
    }

    return Response.json({ server, client, timeZone, limited });
}
