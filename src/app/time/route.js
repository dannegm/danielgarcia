const IPINFO_TOKEN = process.env.NEXT_PUBLIC_IPINFO_TOKEN;

const defaultTimeZone = 'America/Mexico_City';

export async function GET(request) {
    const server = new Date().toLocaleString();

    const ip = request.headers.get('x-forwarded-for') || '8.8.8.8';

    const res = await fetch(`https://ipinfo.io/${ip}/json?token=${IPINFO_TOKEN}`);
    const data = await res.json();

    const timeZone = data?.timezone || defaultTimeZone;
    const client = new Date().toLocaleString('en-US', { timeZone });

    return Response.json({ server, client, timezone: timeZone, limited: !res.ok });
}
