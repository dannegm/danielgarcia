import md5 from 'md5';

export const getExtension = (fileName) => {
    const parts = fileName.split('.');
    return parts[parts.length - 1];
};

export const getMd5 = async (file) => {
    const arrayBuffer = await file.arrayBuffer();
    const buffer = new Uint8Array(arrayBuffer);
    return md5(buffer);
};
