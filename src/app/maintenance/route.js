export const GET = async request => {
    const host = request.headers.get('host') ?? '';

    const html = `<!doctype html>
<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <title>${host}</title>
    </head>
    <body style='margin:0;height:100vh;display:flex;align-items:center;justify-content:center;background:#0a0a0a;color:#fafafa;font-family:system-ui,sans-serif;'>
        <p style='font-size:1rem;letter-spacing:0.02em;'>${host}</p>
    </body>
</html>`;

    return new Response(html, {
        headers: { 'Content-Type': 'text/html; charset=utf-8' },
    });
};
