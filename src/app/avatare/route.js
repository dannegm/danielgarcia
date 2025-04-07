import { join } from 'path';
import { readFile } from 'fs/promises';

export const GET = async () => {
    const filePath = join(process.cwd(), 'public', '/img/avatares/avatare.png');
    const imageBuffer = await readFile(filePath);

    return new Response(imageBuffer, {
        headers: {
            'Content-Type': 'image/png',
            'Content-Disposition': 'inline',
        },
    });
};
