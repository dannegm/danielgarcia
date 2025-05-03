const IPINFO_TOKEN = process.env.NEXT_PUBLIC_IPINFO_TOKEN;

export const getGeolocatedDate = async ({ ip, defaultTimeZone = 'America/Mexico_City' }) => {
    const ipPath = ip ? `${ip}/` : '';
    const res = await fetch(`https://ipinfo.io/${ipPath}json?token=${IPINFO_TOKEN}`);
    const data = await res.json();

    const timeZone = data?.timezone || defaultTimeZone;
    const geolocatedDate = new Date().toLocaleString('en-US', { timeZone });
    return new Date(geolocatedDate);
};
