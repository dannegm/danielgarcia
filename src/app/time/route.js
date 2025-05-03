import { getGeolocatedDate } from '@/modules/core/services/time';

export async function GET(request) {
    const server = new Date().toLocaleString();
    const ip = request.headers.get('x-forwarded-for');
    const client = await getGeolocatedDate({ ip });

    return Response.json({ server, client });
}
